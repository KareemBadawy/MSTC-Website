<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use App\User;
use App\Vertical;
use Carbon\Carbon;
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
        //dd(Auth::user()->username);
        $currentuser = Auth::user();
        //$tasks = collect(Task::unfinished()->get())->sortBy('deadline');
        $tasks = User::findOrfail($currentuser->id)->tasks()->where('status', '=', 0)->where('deadline', '>=', Carbon::now())->orderBy('deadline','desc')->get();
        return view('tasks.index',compact('tasks','currentuser'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finished()
    {
        $currentuser = Auth::user();
        //$tasks = collect(Task::finished()->get())->sortBy('deadline');
        $tasks = User::findOrfail($currentuser->id)->tasks()->where('status', '=', 1)->orwhere('deadline', '<', Carbon::now())->orderBy('deadline','desc')->get();
        return view('tasks.index',compact('tasks','currentuser'));
    }

    public function owntasks()
    {
        $currentuser = Auth::user();
        $tasks = Task::where('user_id', '=', Auth::user()->id)->get();
        return view('tasks.index',compact('tasks','currentuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentuser = Auth::user();
        //dd($currentuser);
        if($currentuser->role == "President")
            $users = User::where('id','!=',Auth::user()->id)->lists('username','id');
        else if($currentuser->role == "Head")
            $users = Vertical::findOrfail($currentuser->verticals[0]->id)->users()->where('role','=','Member')->lists('username','id');
        return view('tasks.create', compact('users','currentuser'));
    }

    public function createFhead()
    {
        $currentuser = Auth::user();
        $users = User::where('role','=','Head')->lists('username','id');
        return view('tasks.create', compact('users','currentuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->body = $request->input('body');
        $task->deadline = $request->input('deadline');
        $task->user_id = Auth::user()->id; 
        $task->save();
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
        $currentuser = Auth::user();
        $task = Task::findOrfail($id);
        return view('tasks.show',compact('task','currentuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentuser = Auth::user();
        $task = Task::findOrfail($id);
         if($currentuser->role == "President")
            $users = User::where('id','!=',Auth::user()->id)->lists('username','id');
        else if($currentuser->role == "Head")
            $users = Vertical::findOrfail($currentuser->verticals[0]->id)->users()->where('role','=','Member')->lists('username','id');
        return view('tasks.edit',compact('task','currentuser','users'));
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
        $task = Task::findOrfail($id);
        $task->title = $request->input('title');
        $task->body = $request->input('body');
        $task->deadline = $request->input('deadline');
        $task->user_id = Auth::user()->id; 
        $task->update();
        $task->users()->sync($request->input('users'), false);
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
