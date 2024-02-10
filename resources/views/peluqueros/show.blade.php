@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-12 border shadow-lg rounded-md max-w-md" style="padding: 20px">
            @if ($peluquero)
                <h2 class="text-4xl font-semibold mb-8 text-gray-800" style="text-align: center; padding:10px; font-size:1.5rem">Detalles del Peluquero</h2>
                <div class="text-gray-700" style="padding: 10px">
                    <p class="mb-4"><strong>Nombre:</strong> {{ $peluquero->nombre }}</p>
                    <p class="mb-4"><strong>Apellidos:</strong> {{ $peluquero->apellidos }}</p>
                    <p class="mb-6"><strong>Especialidad:</strong> {{ $peluquero->especialidad }}</p>
                </div>
                <div class="flex justify-end mt-8">
                    <a href="{{ route('peluqueros.index') }}" class="bg-blue-500 hover:bg-blue-600 text-black py-3 px-6 rounded-md">Volver</a>
                </div>
            @else
                <p class="text-red-500">El peluquero no existe o no se ha encontrado.</p>
            @endif
        </div>
    </div>
@endsection
