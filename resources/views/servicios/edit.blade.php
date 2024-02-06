@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Servicio</h2>
        <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $servicio->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="duracion">Duración (min):</label>
                <input type="number" class="form-control" id="duracion" name="duracion" value="{{ $servicio->duracion }}" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $servicio->precio }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection