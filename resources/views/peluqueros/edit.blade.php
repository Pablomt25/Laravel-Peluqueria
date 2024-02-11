@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="mx-4 bg-white p-8 border shadow-lg rounded-md">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800" style="text-align: center; margin-top:20px">Editar Peluquero</h2>
            <form action="{{ route('peluqueros.update', $peluquero->id) }}" method="POST" style="padding: 10px">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-semibold text-gray-600">Nombre:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="nombre" name="nombre" value="{{ $peluquero->nombre }}" required>
                </div>

                <div class="mb-4">
                    <label for="apellidos" class="block text-sm font-semibold text-gray-600">Apellidos:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="apellidos" name="apellidos" value="{{ $peluquero->apellidos }}" required>
                </div>

                <div class="mb-4">
                    <label for="especialidad" class="block text-sm font-semibold text-gray-600">Especialidad:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="especialidad" name="especialidad" value="{{ $peluquero->especialidad }}" required>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-gray-100 py-2 px-4 rounded-md">Actualizar</button>
                    <a href="{{ route('peluqueros.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
