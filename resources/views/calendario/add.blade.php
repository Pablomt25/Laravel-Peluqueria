<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peluqueria') }}
        </h2>
    </x-slot>

@section('head')
    <style>
        * {
            box-sizing: border-box;
            color: white;
        }
        form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            color: white;
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: green;
            color: white;
        }
    </style>
@endsection

<div>
    <p>Horarios Ocupados</p>
    <table>
        <tr>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
        @foreach($horariosOcupados as $horario)
            <tr>
                <td>{{ $horario->start }}</td>
                <td>{{ $horario->start_time }}</td>
                <td>{{ $horario->end_time }}</td>
            </tr>
        @endforeach
    </table>
</div>

<form action="{{ URL('/create-schedule') }}" method="POST">
        @csrf
        <label for="servicio">{{__('Servicio')}}</label>
        <select name="servicio" id="">
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
            @endforeach
        </select>

        <label for="peluquero">{{__('Peluquero')}}</label>
        <input type="hidden" name="peluquero" value="{{$peluqueroSeleccionado}}" id="">

        <label for="start">{{__('Start')}}</label>
        <input type='date' class='form-control' id='start' name='start' required value='{{ now()->toDateString() }}'>

        <input type='hidden'  class='form-control' id='end' name='end' required value='{{ now()->toDateString() }}'>

        <label for="start_time">{{__('Start')}}</label>
        <input type='time' class='form-control' id='start_time' name='start_time' required value='{{ now()->format('H:i') }}'>

        <input type="submit" value="Save" class="btn btn-success" />
    </form>


</x-app-layout>