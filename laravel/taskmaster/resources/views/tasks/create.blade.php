<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea - TaskMaster 3000</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; display: block; margin-bottom: 5px; }
        input { padding: 8px; width: 300px; }
        button { padding: 10px 15px; background-color: #007BFF; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .success { color: green; font-weight: bold; padding: 10px; background-color: #e6ffe6; border: 1px solid green; margin-bottom: 20px; width: 300px;}
    </style>
</head>
<body>

    <h1>Añadir nueva Tarea al Hexágono 🛑</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/tasks" method="POST">
        
        @csrf 

        <div class="form-group">
            <label for="id">ID de la tarea:</label>
            <input type="text" name="id" id="id" required placeholder="Ej: 101">
        </div>

        <div class="form-group">
            <label for="name">Nombre de la tarea:</label>
            <input type="text" name="name" id="name" required placeholder="Ej: Comprar pan">
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" name="description" id="description" required placeholder="Ej: Ir a la panadería del barrio">
        </div>

        <button type="submit">Guardar Tarea</button>
    </form>

</body>
</html>