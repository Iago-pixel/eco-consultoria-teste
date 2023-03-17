<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index() {

        $search = request('search');
        $user = auth()->user();
        $tasks = [];

        if($search){
            $tasks = Task::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } elseif($user) {
            $tasks = Task::where('user_id',$user->id)->get();
        }


        return view('welcome',['tasks' => $tasks, 'search' => $search]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {

        $task = new Task;

        $task->title = $request->title;
        $task->urgency = $request->urgency;

        $user = auth()->user();
        $task->user_id = $user->id;

        $task->save();

        return redirect('/')->with('msg','Tarefa criada com sucesso!');

    }
}
