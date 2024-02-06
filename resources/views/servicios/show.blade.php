@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-white">Detalles del Servicio</h2>
        <p class="text-white"><strong>Nombre:</strong> {{ $servicio->nombre }}</p>
        <p class="text-white"><strong>Duración (min):</strong> {{ $servicio->duracion }}</p>
        <p class="text-white"><strong>Precio:</strong> {{ $servicio->precio }}</p>
        <a class="text-white" href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection