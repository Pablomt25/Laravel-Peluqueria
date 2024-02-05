@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-white">Lista de Peluqueros</h2>
        <table class="table table-striped table-bordered text-white">
            <thead>
                <tr class="bg-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peluqueros as $peluquero)
                    <tr>
                        <td>{{ $peluquero->id }}</td>
                        <td>{{ $peluquero->nombre }}</td>
                        <td>{{ $peluquero->apellidos }}</td>
                        <td>{{ $peluquero->especialidad }}</td>
                        <td>
                            <a href="{{ route('peluqueros.mostrarTodos', $peluquero->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('peluqueros.edit', $peluquero->id) }}" class="btn btn-warning">Editar</a> 
                            <form action="{{ route('peluqueros.destroy', $peluquero->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar a {{ $peluquero->nombre }}?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection