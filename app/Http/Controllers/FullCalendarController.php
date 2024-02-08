<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Peluqueros;
use App\Models\Servicios;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    //
    public function index()
    {
        $peluqueros = Peluqueros::all();
        return view('calendario.index', compact('peluqueros'));
    }

    public function add() {

        $horas = [];
        
        $peluqueroSeleccionado = $_GET['peluquero'];
        $horariosOcupados = Calendario::where('peluquero', $peluqueroSeleccionado)
        ->get()
        ->pluck('start_time', 'end_time');
        $peluqueros = Peluqueros::all();
        $servicios = Servicios::all();
        return view('calendario.add', compact('peluqueroSeleccionado', 'servicios', 'horariosOcupados', 'horas'));
    }

    public function create(Request $request)
    {
        // Buscar el servicio seleccionado
        $servicio = Servicios::find($request->servicio);
        // Calcular el end_time
        $start_time = Carbon::parse($request->start_time);
        $end_time = $start_time->copy()->addMinutes($servicio->duracion);

        $citas = Calendario::where('peluquero', $request->peluquero)
        ->where(function ($query) use ($start_time, $end_time) {
            $query->where(function ($query) use ($start_time, $end_time) {
                // La cita comienza o termina dentro del rango de tiempo solicitado
                $query->whereBetween('start_time', [$start_time, $end_time])
                    ->orWhereBetween('end_time', [$start_time, $end_time]);
            })->orWhere(function ($query) use ($start_time, $end_time) {
                // La cita comienza antes y termina después del rango de tiempo solicitado
                $query->where('start_time', '<', $start_time)
                    ->where('end_time', '>', $end_time);
            });
        })
        ->get();

        if ($citas->count() > 0) {
            // El peluquero no está disponible en el rango de horario solicitado
            return redirect('/calendario')->withErrors(['El peluquero no está disponible en el rango de horario solicitado']);
        }

        if ($request->peluquero == 1) {
            $color = '#FF0000';
        } else if ($request->peluquero == 2) {
            $color = '#00FF00';
        } else if ($request->peluquero == 3) {
            $color = '#0000FF';
        }

        $item = new Calendario();
        $item->usuario = auth()->user()->id;
        $item->servicio = $request->servicio;
        $item->peluquero = $request->peluquero;
        $item->start = $request->start;
        $item->end = $request->end;
        $item->start_time = $start_time;
        $item->end_time = $end_time;
        $item->description = $request->description;
        $item->color = $color;
        $item->save();

        return redirect('/calendario');
    }


    public function getEvents()
{
    $userId = auth()->user()->id;
    $schedules = Calendario::where('usuario', $userId)->get();
    return response()->json($schedules);
}

    public function deleteEvent($id)
    {
        $schedule = Calendario::findOrFail($id);
        $schedule->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    public function update(Request $request, $id)
    {
        $schedule = Calendario::findOrFail($id);

        $schedule->update([
            'start' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            'end' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        return response()->json(['message' => 'Event moved successfully']);
    }

    public function resize(Request $request, $id)
    {
        $schedule = Calendario::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('end_date'))->setTimezone('UTC');
        $schedule->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }

    public function search(Request $request)
    {
        $searchKeywords = $request->input('title');

        $matchingEvents = Calendario::where('title', 'like', '%' . $searchKeywords . '%')->get();

        return response()->json($matchingEvents);
    }
}