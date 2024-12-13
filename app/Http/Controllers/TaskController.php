<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $todos = DB::table('tasks')->where('item', 'like', "%{$search}%")->paginate(3);
        } else {
            $todos = Task::paginate(5);
        }

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'item' => 'required',
        ]);

        Task::create($validateData);

        return redirect('/todos')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todos = DB::table('tasks')->where('id', $id)->first();
        if (!$todos) {
            abort(404);
        }
        return view('todos.show', ['todos' => $todos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todos = DB::table('tasks')->where('id', $id)->first();
        if (!$todos) {
            abort(404);
        }
        return view('todos.edit', compact('todos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'item' => 'required',
        ]);

        $todos = Task::find($id);

        if(!$todos){
            abort(404);
        }

        $todos->update($validateData);

        return redirect()->route('todos.index', ['id' => $id])->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Task::findOrFail($id);

        if(!$todo) {
            abort(404);
        }

        $todo->delete();
        return redirect('/todos')->with('success', 'Task deleted successfully');
    }
}
