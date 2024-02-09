<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Peluqueros;
use App\Models\Servicios;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacionCita;

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

        $horasDisponibles = [
            '10:00:00',
            '10:30:00',
            '11:00:00',
            '11:30:00',
            '12:00:00',
            '12:30:00',
            '13:00:00',
            '13:30:00',
            '16:00:00',
            '16:30:00',
            '17:00:00',
            '17:30:00',
            '18:00:00',
            '18:30:00',
            '19:00:00',
            '19:30:00',
        ];
        
        $peluqueroSeleccionado = $_GET['peluquero'];
        $start = ($_GET['start']);
    
        $horariosOcupados = Calendario::where('peluquero', $peluqueroSeleccionado)
        ->where('start', $start)
        ->get()
        ->map(function ($item) {
            return [
                'start_time' => $item->start_time,
            ];
        });
        $horariosOcupados = $horariosOcupados->pluck('start_time')->toArray();

        $horasDisponibles = array_diff($horasDisponibles, $horariosOcupados);

        $peluqueros = Peluqueros::all();
        $servicios = Servicios::all();


        return view('calendario.add', compact('peluqueroSeleccionado', 'servicios', 'horariosOcupados', 'horasDisponibles', 'start'));
    }

    public function create(Request $request)
    {
        // Buscar el servicio seleccionado
        $servicio = Servicios::find($request->servicio);
        // Calcular la hora de inicio y fin de la cita
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);    
        $start_time = Carbon::parse($request->start_time);
        $end_time = $start_time->copy()->addMinutes(30);
        
        // Verificar que la cita se haga en un día
        if ($start->toDateString() != $end->toDateString()) {
            // Las fechas de inicio y finalización no son las mismas, por lo que la cita se extiende a través de dos días
            // Puedes lanzar una excepción, devolver un error, etc.
        }
        
        $citas = Calendario::where('peluquero', $request->peluquero)
            ->whereDate('start', $start->toDateString())
            ->where(function ($query) use ($start_time, $end_time) {
                $query->where(function ($query) use ($start_time, $end_time) {
                    $query->whereTime('start_time', '>=', $start_time->toTimeString())
                        ->whereTime('start_time', '<', $end_time->toTimeString());
                })->orWhere(function ($query) use ($start_time, $end_time) {
                    $query->whereTime('end_time', '>', $start_time->toTimeString())
                        ->whereTime('end_time', '<=', $end_time->toTimeString());
                });
            })
            ->get();


        if ($citas->count() > 0) {
            // El peluquero no está disponible en el rango de horario solicitado
            return redirect('/pedircita')->withErrors(['El peluquero no está disponible en el rango de horario solicitado']);
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
        $item->end = $request->start;
        $item->start_time = $start_time;
        $item->end_time = $end_time;
        $item->description = $request->description;
        $item->color = $color;
        $item->save();

        // $clienteEmail = 'raulgodii13@gmail.com';
        // Mail::to("raulgodii13@gmail.com")->send(new ConfirmacionCita());

        return redirect('/pedircita')->with('success', 'Cita agendada correctamente');
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