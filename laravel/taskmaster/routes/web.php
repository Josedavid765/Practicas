<?php

use Illuminate\Support\Facades\Route;
use App\Core\Application\CompleteTaskService;
use App\Core\Application\CreateTaskService;
use App\Core\Application\DeleteTaskService;
use App\Core\Application\ListTaskService;
use App\Models\TaskModel;
use App\Core\Domain\Task;
use App\Core\Domain\TaskRepositoryInterface;
use Illuminate\Http\Request;

Route::get('/test-hexagonal', function (CompleteTaskService $service, TaskRepositoryInterface $repository) {
    
    $tareaDePrueba = new Task("999", "Dominar Arquitectura Hexagonal", "Prueba de JSON", false);

    $repository->save($tareaDePrueba);

    $service->execute("999");

    return "¡ÉXITO ABSOLUTO! La tarea 999 ha sido completada. Revisa la carpeta storage/app/ de tu proyecto.";
});

//Mostrar Inicio

Route::get('/tasks/inicio', function (ListTaskService $service) {
    $tasks = $service->execute();

    return view('tasks.inicio', compact('tasks'));
});

//Marcar como Completada

Route::post ('/tasks/{id}/complete', function (string $id ,CompleteTaskService $service){

    $service->execute($id);

    return redirect('/tasks/inicio')->with('success', "La tarea $id ha sido completada con exito");
});

//Crear una nueva Tarea Vista

Route::get('/tasks/create', function(){
    return view('tasks.create');
});

//Creacion de la Tarea y redireccion a Inicio
Route::post('/tasks', function (Request $request, CreateTaskService $createTaskService){
    $id = $request->input('id');
    $name = $request->input('name');
    $descripcion = $request->input('description');

    $createTaskService->execute($id, $name, $descripcion);

    return redirect('/tasks/inicio')->with('succes', "LA tarea $name fue creada con exito y guardada el Json");
});


//Borra la tarea antes de ser completada y si ya esta completa se elimina de la vista pero no del JSON
Route::delete('/tasks/{id}borrar', function (string $id, DeleteTaskService $service) {
    $service->execute($id);

    return redirect('/tasks/inicio')->with('success', "La tarea $id ha sido eliminada con exito y eliminada del Json");
});