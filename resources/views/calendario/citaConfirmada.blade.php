<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita</title>
</head>
<body>
    <h2>¡Confirmación de Cita!</h2>
    
    <p>Hola {{ $usuario->name }},</p>
    
    <p>Tu cita ha sido confirmada con éxito. Aquí están los detalles:</p>
    
    <p><strong>Fecha:</strong> {{ $cita->start }}</p>
    <p><strong>Hora de inicio:</strong> {{ $cita->start_time }}</p>
    <p><strong>Hora de fin:</strong> {{ $cita->end_time }}</p>
    <p><strong>Descripción:</strong> {{ $cita->description }}</p>
    
    <p>¡Gracias!</p>
</body>
</html>
