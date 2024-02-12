@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen" style="margin-top:20px">
        <div class="bg-white p-12 border shadow-lg rounded-md max-w-md" style="padding: 20px">
            @if ($citas->isNotEmpty())
                <h2 class="text-4xl font-semibold mb-8 text-gray-800" style="text-align: center; padding:10px; font-size:1.5rem">Citas del Calendario</h2>
                <div class="text-gray-700" style="padding: 10px">
                    <ul>
                        @foreach ($citas as $cita)
                            <li>
                                <strong>Peluquero:</strong> {{ $cita->peluquero }} <br>
                                <strong>Servicio:</strong> {{ $cita->servicio }} <br>
                                <strong>Fecha:</strong> {{ $cita->start }} <br>
                                <strong>Hora de inicio:</strong> {{ $cita->start_time }} <br>
                                <strong>Hora de fin:</strong> {{ $cita->end_time }} <br>
                                <strong>Descripción:</strong> {{ $cita->description }}
                                <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded-md text-sm" onclick="return confirm('¿Estás seguro?')">Cancelar</button>
                                </form>
                            </li>
                            <hr style="margin-bottom: 15px; margin-top:15px;">
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
