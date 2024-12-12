<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::paginate(10); // Returns paginated tasks
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'in:pending,completed',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function show($id)
    {
        return Task::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => 'max:255',
            'status' => 'in:pending,completed',
        ]);

        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->noContent();
    }
}
