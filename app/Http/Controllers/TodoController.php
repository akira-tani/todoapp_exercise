<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Task::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Task::$rules);
        $form = $request->all();
        Task::create($form);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Task::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/');
    }
}
