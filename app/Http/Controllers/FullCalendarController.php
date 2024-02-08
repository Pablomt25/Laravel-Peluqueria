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
        return view('calendario.index');
    }

    public function add() {
        $horas = [];
        $intervalos = [['10:00', '14:00'], ['16:00', '20:00']];

        foreach ($intervalos as $intervalo) {
            $hora = Carbon::parse($intervalo[0]);
            while ($hora->lessThan(Carbon::parse($intervalo[1]))) {
                $horas[] = $hora->format('H:i');
                $hora->addMinutes(30);
            }
        }

        $peluqueroSeleccionado = $_GET['peluquero'];
        $horariosOcupados = Calendario::where('peluquero', $peluqueroSeleccionado)
        ->get()
        ->pluck('start_time', 'end_time');
        $peluqueros = Peluqueros::all();
        $servicios = Servicios::all();
        return view('calendario.add', compact('peluqueros', 'servicios', 'horariosOcupados', 'horas'));
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



        $item = new Calendario();
        $item->servicio = $request->servicio;
        $item->peluquero = $request->peluquero;
        $item->start = $request->start;
        $item->end = $request->end;
        $item->start_time = $start_time;
        $item->end_time = $end_time; // Usar el end_time calculado
        $item->description = $request->description;
        $item->color = $request->color;
        $item->save();

        return redirect('/calendario');
    }


    public function getEvents()
    {
        $schedules = Calendario::all();
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