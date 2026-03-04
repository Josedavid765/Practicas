<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - TaskMaster 3000</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f4f7f6; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; border-bottom: 2px solid #007BFF; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        tr:hover { background-color: #f1f1f1; }
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 0.8em; font-weight: bold; }
        .bg-warning { background-color: #ffc107; color: #333; }
        .btn-add { display: inline-block; background: #007BFF; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
        .btn-complete { background: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; }
        .btn-delete { background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>Mis Tareas Pendientes 📝</h1>
    
    <a href="/tasks/create" class="btn-add">+ Añadir Nueva Tarea</a>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
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
            {{-- Variable auxiliar para saber si hemos impreso alguna tarea pendiente --}}
            @php $hayPendientes = false; @endphp

            @foreach($tasks as $task)
                {{-- MAGIA: Solo entramos a dibujar la fila SI la tarea NO está completada --}}
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

            {{-- Si después de revisar todo el JSON no había ninguna pendiente, mostramos esto --}}
            @if(!$hayPendientes)
                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px;">
                        🎉 <strong>¡Todo al día!</strong> No tienes tareas pendientes.
                    </td>
                </tr>
            @endif

        </tbody>
    </table>
</div>

</body>
</html>