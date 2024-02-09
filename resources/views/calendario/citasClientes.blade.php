@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-12 border shadow-lg rounded-md max-w-md">
            @if ($citas->isNotEmpty())
                <h2 class="text-4xl font-semibold mb-8 text-gray-800">Citas del Calendario</h2>
                <div class="text-gray-700">
                    <ul>
                        @foreach ($citas as $cita)
                            <li>
                                <strong>Peluquero:</strong> {{ $cita->peluquero }} <br>
                                <strong>Servicio:</strong> {{ $cita->servicio }} <br>
                                <strong>Fecha:</strong> {{ $cita->start }} <br>
                                <strong>Hora de inicio:</strong> {{ $cita->start_time }} <br>
                                <strong>Hora de fin:</strong> {{ $cita->end_time }} <br>
                                <strong>Descripción:</strong> {{ $cita->description }}
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
                <div class="flex justify-end mt-8">
                    <a href="{{ route('peluqueros.index') }}" class="bg-blue-500 hover:bg-blue-600 text-black py-3 px-6 rounded-md">Volver</a>
                </div>
            @else
                <p class="text-red-500">No hay citas en el calendario.</p>
            @endif
        </div>
    </div>
@endsection
