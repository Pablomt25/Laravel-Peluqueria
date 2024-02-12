<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barbería') }}
        </h2>
    </x-slot>

    @section('head')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Schedule Tracker</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @endsection

    <div class="container mt-5 text-white d-flex align-items-center">
        {{-- For Search --}}
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                </div>
            </div>

            <div class="col-md-6">
                <form action="{{ URL('add-schedule') }}" method="GET" style="margin: 20px; padding:20px; background-color:rgb(219, 219, 219); margin-right:500px; text-align:center; margin-left:500px;border-radius:10px">
                    <label style="color: black" for="peluquero">{{__('Peluquero')}}</label>
                    <select name="peluquero" style="color: black" class="form-control">
                        @foreach($peluqueros as $peluquero)
                            <option value="{{ $peluquero->id }}" style="color: black">{{ $peluquero->nombre }}</option>
                        @endforeach
                    </select>
                    
                    <label style="color:black" for="start">Día</label>
                    <input type="date" name="start" id="start" value="{{ now()->toDateString() }}" min="{{ now()->toDateString() }}" class="form-control" style="color: black">

                    <!-- Ajustado el estilo del botón -->
                    <button type="submit" class="btn btn-success mt-2" style="background-color: green; color: white; padding:9px; border-radius:10px">Pedir cita</button>
                </form>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-body  d-flex justify-content-center ">
                <div id="calendar" style="max-width: 800px; max-height: 600px; margin-left:370px"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendarEl = document.getElementById('calendar');
        var events = [];
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title', 
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            eventTimeFormat: { 
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false
            },
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: '/events',
            editable: false,

            eventContent: function(info) {
                var startTime = info.event.extendedProps.start_time;
                var endTime = info.event.extendedProps.end_time;
                var formattedStartTime = startTime.slice(0, -3);
                var formattedEndTime = endTime.slice(0, -3);
                var peluquero = info.event.extendedProps.peluquero;
                var servicio = info.event.extendedProps.servicio;
                var eventElement = document.createElement('div');
                eventElement.innerHTML = '<p>Hora: ' + formattedStartTime + ' - ' + formattedEndTime + '</p><p>Peluquero: ' + peluquero + '</p><p> Servicio: ' + servicio + '</p>';

                return {
                    domNodes: [eventElement]
                };
            },

           
        });

        calendar.render();



    </script>


</x-app-layout>
