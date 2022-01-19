<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['tasks'] = Task::where('created_by',Auth::user()->id)->get();
        return view('tasks.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetching the pair of task status mapping from TaskStatus enum
        $data['tasks_status'] = TaskStatus::asSelectArray();        // it will return array of ["value" => "key"] from TaskStatus enum. Actually this is a reverse convention.
        $data['categories_list'] = Category::where('created_by',Auth::user()->id)->get();
        return view('tasks.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $taskRequest)
    {
        //
        $task = new Task();
        $task->name = $taskRequest->task_name;
        $task->details = $taskRequest->task_details;
        $task->category_id = $taskRequest->category_id;
        $task->created_by = Auth::user()->id;
        $task->deadline = $taskRequest->task_deadline;
        $task->status = $taskRequest->task_status;
        $task->save();
        return redirect("/tasks");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['task'] = Task::where('created_by',Auth::user()->id)->find($id);
        $data['categories_list'] = Category::where('created_by',Auth::user()->id)->get();
        $data['tasks_status'] = TaskStatus::asSelectArray(); // returns array of ["value" => "key"]
        return view('tasks.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $taskRequest, $id)
    {
        //
        $task = Task::where("created_by",Auth::user()->id)->find($id);
        if(!$task)
        {
            return redirect('/tasks');
        } 
        $task->name = $taskRequest->task_name;
        $task->category_id = $taskRequest->category_id;
        $task->status = $taskRequest->task_status;
        $task->details = $taskRequest->task_details;
        $task->deadline = $taskRequest->task_deadline;
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::where('created_by',Auth::user()->id)->find($id);
        if(!$task)
        {
            return redirect('/tasks');
        }
        $task->delete();
        return redirect('/tasks');
    }
}
