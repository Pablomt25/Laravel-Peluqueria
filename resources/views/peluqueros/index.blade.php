<x-app-layout>
    <x-slot name="header">
        <!-- Encabezado de tu página -->
    </x-slot>

    <div class="container">
        <h2 class="text-white">Listado de Servicios</h2>
        @if ($servicios->isEmpty())
            <p>No hay servicios disponibles.</p>
        @else
            <table class="table table-striped table-bordered text-white">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Duración (min)</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->duracion }}</td>
                            <td>{{ $servicio->precio }}</td>
                            <td>
                                <a href="{{ route('servicios.show', $servicio->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
