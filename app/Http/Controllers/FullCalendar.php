<?php

namespace App\Http\Controllers;
class FullCalendar extends Controller
{

    public function index()
    {
        return view('calendario.index');
    }
    public function calendar()
    {
        $events = [];

        $start_dates = ['2023-06-01','2023-06-07','2023-06-11','2023-06-12T10:30:00','2023-06-12','2023-06-12','2023-06-13','2023-06-28'];
        $end_date = ['','2023-06-10','2023-06-13','2023-06-12T12:30:00','2023-06-12T12:00:00','2023-06-12T14:30:00','2023-06-13T07:00:00',''];

        $titles = ['All Day Event','Long Event','Conference','Meeting','Lunch','Meeting','Birthday Party','Click for Google'];
        $links = ['','','','','','','','https://www.google.com/'];

        foreach ($titles as $key=> $title) {
            $events[]   = [
                'title' => $title,
                'start' => $start_dates[$key],
                'end'   => $end_date[$key],
                'url'   => $links[$key],
            ];
        }

        $data = [
            'events' => $events
        ];

        return view('fullcalendar',$data);
    }
}