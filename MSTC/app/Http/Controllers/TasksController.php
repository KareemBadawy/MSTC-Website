<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TasksController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = collect(Task::unfinished()->get())->sortBy('deadline');
        
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finished()
    {
        $tasks = collect(Task::finished()->get())->sortBy('deadline');
        return view('tasks.index',compact('tasks'));
    }

    public function getuserstasks($user_id)
    {
        $tasks = Task::where('user_id',$user_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::lists('username','id');
        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
       
        $task = Task::create($request->all());
        $task->users()->attach($request->input('users'));
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrfail($id);
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrfail($id);
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Task::findOrfail($id)->update($request->all());
        return redirect('tasks');
    }

    public function updatestatus($id){
        Task::where('id',$id)->update(array('status'=>1));
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrfail($id)->delete();
        return redirect('tasks');
    }
}
