<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peluqueria') }}
        </h2>
    </x-slot>

@section('head')
    <style>
        form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
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
@section('content')
    <form action="{{ URL('/create-schedule') }}" method="POST">
        @csrf
        {{-- <label for='title'>{{ __('title') }}</label>
        <input type='text' class='form-control' id='title' name='title'> --}}

        <label for="servicio">{{__('Servicio')}}</label>
        <select name="servicio" id="">
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
            @endforeach
        </select>

        <label for="peluquero">{{__('Peluquero')}}</label>
        <select name="peluquero" id="">
            @foreach($peluqueros as $peluquero)
                <option value="{{ $peluquero->id }}">{{ $peluquero->nombre }}</option>
            @endforeach
        </select>

        <label for="start">{{__('Start')}}</label>
        <input type='date' class='form-control' id='start' name='start' required value='{{ now()->toDateString() }}'>

        <label for="end">{{__('End')}}</label>
        <input type='date' class='form-control' id='end' name='end' required value='{{ now()->toDateString() }}'>

        <label for="start_time">{{__('Start')}}</label>
        <select name="start_time">
            @foreach ($horas as $hora)
                <option value="{{ $hora }}"
                    @if ($horariosOcupados->contains($hora)) disabled @endif
                >
                    {{ $hora }}
                </option>
            @endforeach
        </select>
        <label for="color">{{__('Color')}}</label>
        <input type="color" id="color" name="color" />

        <input type="submit" value="Save" class="btn btn-success" />
    </form>
@endsection

</x-app-layout>