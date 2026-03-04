<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - TaskMaster 3000 (Dark Mode)</title>
    <style>
        /* Fondo principal muy oscuro y texto gris claro para no cansar la vista */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #121212; color: #e0e0e0; }
        
        /* Contenedor un poco más claro para dar sensación de profundidad */
        .container { max-width: 800px; margin: auto; background: #1e1e1e; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        
        /* Título en blanco puro y línea azul brillante */
        h1 { color: #ffffff; border-bottom: 2px solid #3b82f6; padding-bottom: 10px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        
        /* Bordes de la tabla más sutiles */
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #333; }
        th { color: #9ca3af; /* Títulos de columna en gris más suave */ }
        
        /* Hover de la tabla: un gris ligeramente más claro */
        tr:hover { background-color: #2a2a2a; }
        
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 0.8em; font-weight: bold; }
        
        /* Amarillo mostaza (no chilla tanto en fondos oscuros) con texto oscuro para leerse bien */
        .bg-warning { background-color: #f59e0b; color: #111; } 
        
        /* Botones ajustados con tonos más modernos y efectos hover sutiles */
        .btn-add { display: inline-block; background: #3b82f6; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; transition: 0.3s; }
        .btn-add:hover { background: #2563eb; }
        
        .btn-complete { background: #10b981; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; transition: 0.3s; }
        .btn-complete:hover { background: #059669; }
        
        .btn-delete { background: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; transition: 0.3s; }
        .btn-delete:hover { background: #dc2626; }
    </style>
</head>
<body>

<div class="container">
    <h1>Mis Tareas Pendientes 📝</h1>
    
    <a href="/tasks/create" class="btn-add">+ Añadir Nueva Tarea</a>

    @if(session('success'))
        {{-- OJO: He cambiado el verde normal por un verde pastel (#4ade80) que se lee mil veces mejor en oscuro --}}
        <p style="color: #4ade80; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php $hayPendientes = false; @endphp

            @foreach($tasks as $task)
                @if(!$task->isCompleted())
                    @php $hayPendientes = true; @endphp
                    <tr>
                        <td>{{ $task->getId() }}</td>
                        <td>{{ $task->getName() }}</td>
                        <td>{{ $task->getDescription() }}</td>
                        <td>
                            <span class="badge bg-warning">Pendiente</span>
                        </td>
                        <td>
                            <form action="/tasks/{{ $task->getId() }}/complete" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-complete">Completar</button>
                            </form>

                            <form action="/tasks/{{ $task->getId() }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach

            @if(!$hayPendientes)
                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px; color: #9ca3af;">
                        🎉 <strong>¡Todo al día!</strong> No tienes tareas pendientes.
                    </td>
                </tr>
            @endif

        </tbody>
    </table>
</div>

</body>
</html>