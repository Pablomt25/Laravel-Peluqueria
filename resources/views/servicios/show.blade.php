@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-12 border shadow-lg rounded-md max-w-md">
            @if ($servicio)
                <h2 class="text-4xl font-semibold mb-8 text-gray-800">Detalles del Servicio</h2>
                <div class="text-gray-700">
                    <p class="mb-4"><strong>Nombre:</strong> {{ $servicio->nombre }}</p>
                    <p class="mb-4"><strong>Duración (min):</strong> {{ $servicio->duracion }}</p>
                    <p class="mb-6"><strong>Precio:</strong> {{ $servicio->precio }}</p>
                </div>
                <div class="flex justify-end mt-8">
                    <a href="{{ route('servicios.index') }}" class="bg-blue-500 hover:bg-blue-600 text-black py-3 px-6 rounded-md">Volver</a>
                </div>
            @else
                <p class="text-red-500">El servicio no existe o no se ha encontrado.</p>
            @endif
        </div>
    </div>
@endsection
