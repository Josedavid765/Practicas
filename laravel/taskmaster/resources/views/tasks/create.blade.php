<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea - TaskMaster 3000 (Dark Mode)</title>
    <style>
        /* Fondo general igual que el inicio */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #121212; color: #e0e0e0; }
        
        /* Contenedor central a juego con la otra pantalla */
        .container { max-width: 500px; margin: auto; background: #1e1e1e; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        
        h1 { color: #ffffff; border-bottom: 2px solid #3b82f6; padding-bottom: 10px; margin-top: 0; font-size: 1.8em; }
        
        .form-group { margin-bottom: 20px; }
        
        /* Labels en gris claro para que no chillen tanto como el blanco */
        label { font-weight: bold; display: block; margin-bottom: 8px; color: #9ca3af; }
        
        /* Cajas de texto modo oscuro */
        input { 
            width: 100%; 
            box-sizing: border-box; /* Para que el padding no desborde el ancho */
            padding: 12px; 
            background-color: #2a2a2a; 
            color: #ffffff; 
            border: 1px solid #444; 
            border-radius: 5px; 
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        
        /* Efecto neón sutil cuando haces clic en el input */
        input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 8px rgba(59, 130, 246, 0.3);
        }

        /* Placeholder (el texto de ejemplo) un poco más oscuro */
        input::placeholder { color: #6b7280; }

        /* Botón de guardar a todo el ancho */
        button { width: 100%; padding: 12px; background-color: #3b82f6; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em; font-weight: bold; transition: 0.3s; }
        button:hover { background-color: #2563eb; }
        
        /* Mensaje de éxito adaptado a fondos oscuros */
        .success { color: #4ade80; font-weight: bold; padding: 12px; background-color: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; border-radius: 5px; margin-bottom: 20px; }

        /* Enlace para volver atrás */
        .back-link { color: #9ca3af; text-decoration: none; display: inline-block; margin-bottom: 20px; font-size: 0.9em; transition: color 0.3s; }
        .back-link:hover { color: #ffffff; }
    </style>
</head>
<body>

    <div class="container">
        <a href="/tasks/inicio" class="back-link">⬅ Volver al listado</a>

        <h1>Añadir nueva Tarea 🛑</h1>

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
    </div>

</body>
</html>