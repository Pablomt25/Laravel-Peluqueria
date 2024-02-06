<x-app-layout>
    <x-slot name="header">
        <!-- Encabezado de tu página -->
    </x-slot>

<div class="container">
    <h2 class="text-white">Listado de Peluqueros</h2>
    @if ($peluqueros->isEmpty())
        <p>No hay peluqueros disponibles.</p>
    @else
        <table class="table table-striped table-bordered text-white">
            <thead>
                <tr class="bg-dark">
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Especialidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peluqueros as $peluquero)
                    <tr>
                        <td>{{ $peluquero->nombre }}</td>
                        <td>{{ $peluquero->apellidos }}</td>
                        <td>{{ $peluquero->especialidad }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
