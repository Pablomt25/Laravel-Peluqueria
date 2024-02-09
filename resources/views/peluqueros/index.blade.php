<x-app-layout>
    <x-slot name="header">
        <!-- Encabezado de tu página -->
    </x-slot>

    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold text-white mb-6 text-center">Listado de Peluqueros</h2>

        @if ($peluqueros->isEmpty())
            <p class="text-gray-300 text-center">No hay peluqueros disponibles.</p>
        @else
            <div class="overflow-x-auto">
                <table class="mx-auto min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Nombre</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Apellidos</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Especialidad</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($peluqueros as $peluquero)
                            <tr>
                                <td class="py-3 px-4 border-b border-gray-600">{{ $peluquero->nombre }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">{{ $peluquero->apellidos }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">${{ $peluquero->especialidad }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">
                                    <a href="{{ route('peluqueros.create') }}" class="text-blue-500 hover:underline">Crear</a>
                                    <a href="{{ route('peluqueros.show', $peluquero->id) }}" class="text-blue-500 hover:underline">Ver</a>
                                    <a href="{{ route('peluqueros.edit', $peluquero->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    <form action="{{ route('peluqueros.destroy', $peluquero->id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded-md text-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
