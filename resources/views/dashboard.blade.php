<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barbería</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }


        /* Estilo para el encabezado */
        .custom-container h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Estilo para la sección de imágenes */
        .custom-container .p-6 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
        }

        /* Estilo para cada imagen */
        .custom-container .image-container {
            position: relative;
            margin: 10px;
            border-radius: 8px;
            overflow: hidden;
        }

        .custom-container img {
            width: 100%;
            max-width: 300px;
            height: auto;
        }

        /* Estilo para el título encima de la imagen */
        .custom-container .image-title {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Estilo para el botón debajo de la imagen */
        .custom-container .cta-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-container .cta-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <!-- Utilizar el contenedor adicional -->
    <div class="custom-container">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Barbería') }}
                </h2>
            </x-slot>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <!-- Imagen 1 -->
                            <div class="image-container">
                                <img src="../img/corte-hombre.jpg" alt="">
                                <div class="image-title">Corte de Hombre</div>
                                <button class="cta-button">Pedir Cita</button>
                            </div>

                            <!-- Imagen 2 -->
                            <div class="image-container">
                                <img src="../img/mechas.jpeg" alt="">
                                <div class="image-title">Mechas</div>
                                <button class="cta-button">Pedir Cita</button>
                            </div>

                            <!-- Imagen 3 -->
                            <div class="image-container">
                                <img src="../img/barba.jpg" alt="">
                                <div class="image-title">Barba</div>
                                <button class="cta-button">Pedir Cita</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </div>
</body>
</html>
