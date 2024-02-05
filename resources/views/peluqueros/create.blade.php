@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nuevo Peluquero</h2>
        <form method="POST" action="{{ route('peluqueros.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="especialidad">Especialidad:</label>
                <input type="text" name="especialidad" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Crear Peluquero</button>
        </form>
    </div>
@endsection