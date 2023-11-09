<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller{
    public function index()
    {
        if(Auth::check()){
            $tasks = Auth::User()->tasks;
            return view('taskhome',['tasks' => $tasks]);
        }
        return redirect()->route('login');
    }
    public function store() :RedirectResponse{
        $validated = request()->validate([
            'title' => 'required|min:3|max:255|',
            'description' => 'required|min:3|max:255|',
            'due_date'=>'required|date|after:today'
        ]);
        $task = Task::create(
            [
                'title' => $validated['title'],
                'description' => $validated['description'],
                'due_date' => $validated['due_date'],
                'user_id' => Auth::user()->id
            ]
        );
        return redirect()->route('task.index');

    }
}
