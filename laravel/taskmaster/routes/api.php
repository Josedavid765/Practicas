<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Core\Application\CreateTaskService;
use App\Core\Application\CompleteTaskService;

Route::post('/tasks', function (Request $request, CreateTaskService $service)
{
    $id = $request->input('id');
    $name = $request->input('name');
    $description = $request->input('description');

    $service->execute($id, $name, $description);

    return response()->json(['mesage' => "Tarea $id creada y guardada con exito"]);
});

Route::put('tasks/{id}/complete', function (string $id, CompleteTaskService $service){
    $service->execute($id);

    return response()->json(['mensaje' => "La tarea $id ha pasado por el Hexagono y esta completada"]);
});