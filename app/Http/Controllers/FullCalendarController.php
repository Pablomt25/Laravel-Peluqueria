<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
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

    public function create(Request $request)
    {
        $item = new Calendario();
        $item->title = $request->title;
        $item->start = $request->start;
        $item->end = $request->end;
        $item->start_time = $request->start_time;
        $item->end_time = $request->end_time;
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