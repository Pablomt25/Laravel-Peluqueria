<x-app-layout>
    <x-slot name="header">
        <!-- Encabezado de tu página -->
    </x-slot>

    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold text-white mb-6 text-center">Listado de Servicios</h2>

        @if ($servicios->isEmpty())
            <p class="text-gray-300 text-center">No hay servicios disponibles.</p>
        @else
            <div class="overflow-x-auto">
                <table class="mx-auto min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Nombre</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Duración (min)</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Precio</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($servicios as $servicio)
                            <tr>
                                <td class="py-3 px-4 border-b border-gray-600">{{ $servicio->nombre }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">{{ $servicio->duracion }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">${{ $servicio->precio }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">
                                    <a href="{{ route('servicios.show', $servicio->id) }}" class="text-blue-500 hover:underline">Ver</a>
                                    <a href="{{ route('servicios.edit', $servicio->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" class="inline-block ml-2">
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
