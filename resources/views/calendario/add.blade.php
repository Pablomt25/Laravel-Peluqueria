<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peluqueria') }}
        </h2>
    </x-slot>

    @section('head')
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @endsection

    <form action="{{ URL('/create-schedule') }}" method="POST" class="max-w-md mx-auto mt-8 bg-white p-8 rounded shadow-md" style="margin-left: 300px; margin-right: 300px; padding:20px">
        @csrf

        <div class="mb-4">
            <label for="servicio" class="block text-gray-700 text-sm font-bold mb-2">Servicio</label>
            <select name="servicio" id="servicio" class="w-full p-2 border border-gray-300 rounded">
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="peluquero" class="block text-gray-700 text-sm font-bold mb-2">Peluquero</label>
            <input type="hidden" name="peluquero" value="{{ $peluqueroSeleccionado }}" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">Hora</label>
            <select id="start_time" name="start_time" class="w-full p-2 border border-gray-300 rounded" required>
                @foreach ($horasDisponibles as $hora)
                    <option value="{{ $hora }}">{{ $hora }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" class="form-control" id="start" name="start" required value="{{ $start }}">
        <input type="hidden" class="form-control" id="end" name="end" required value="{{ now()->toDateString() }}">

        <button type="submit" style=" background-color:green;color: white; padding: 8px 16px; border-radius: 4px;">Solicitar</button>

    </form>
</x-app-layout>
