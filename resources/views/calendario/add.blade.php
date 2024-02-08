<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peluqueria') }}
        </h2>
    </x-slot>

@section('head')
    <style>
        form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: green;
            color: white;
        }
    </style>
@endsection
@section('content')
    <form action="{{ URL('/create-schedule') }}" method="POST">
        @csrf
        <label for='title'>{{ __('title') }}</label>
        <input type='text' class='form-control' id='title' name='title'>

        <label for="start">{{__('Start')}}</label>
        <input type='date' class='form-control' id='start' name='start' required value='{{ now()->toDateString() }}'>

        <label for="end">{{__('End')}}</label>
        <input type='date' class='form-control' id='end' name='end' required value='{{ now()->toDateString() }}'>

        <label for="start">{{__('Start')}}</label>
        <input type='time' class='form-control' id='start' name='start_time' required value='{{ now()->toTimeString() }}'>

        <label for="end">{{__('End')}}</label>
        <input type='time' class='form-control' id='end' name='end_time' required value='{{ now()->toTimeString() }}'>


        <label for="description">{{__('Description')}}</label>
        <textarea id="description" name="description"></textarea>

        <label for="color">{{__('Color')}}</label>
        <input type="color" id="color" name="color" />

        <input type="submit" value="Save" class="btn btn-success" />
    </form>
@endsection

</x-app-layout>