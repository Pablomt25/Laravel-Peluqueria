<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Peluquero') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <div class="mx-4 bg-white p-8 border shadow-lg rounded-md">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Crear Nuevo Servicio</h2>
            <form method="POST" action="{{ route('servicios.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-semibold text-gray-600">Nombre:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="nombre" name="nombre" required>
                </div>
                <div class="mb-4">
                    <label for="duracion" class="block text-sm font-semibold text-gray-600">Duracion:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="duracion" name="duracion" required>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-sm font-semibold text-gray-600">Precio:</label>
                    <input type="text" class="form-input mt-1 block w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500" id="precio" name="precio">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-gray-100 py-2 px-4 rounded-md">Crear Servicio</button>
            </form>
        </div>
    </div>
</x-app-layout>
