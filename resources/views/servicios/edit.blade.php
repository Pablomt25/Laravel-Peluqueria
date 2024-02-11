@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="mx-4 bg-white p-8 border shadow-lg rounded-md">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800" style="text-align: center; margin-top:20px">Editar Servicio</h2>
            <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" style="padding: 10px">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-semibold text-gray-600">Nombre:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="nombre" name="nombre" value="{{ $servicio->nombre }}" required>
                </div>

                <div class="mb-4">
                    <label for="duracion" class="block text-sm font-semibold text-gray-600">Duración (min):</label>
                    <input type="number" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="duracion" name="duracion" value="{{ $servicio->duracion }}" required>
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-sm font-semibold text-gray-600">Precio:</label>
                    <input type="number" step="0.01" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="precio" name="precio" value="{{ $servicio->precio }}" required>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-gray-100 py-2 px-4 rounded-md">Actualizar</button>
                    <a href="{{ route('servicios.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
