<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userName = Auth::guard('admin')->user();
        $getTasks = Task::with('user')->orderBy('id','DESC')->get();

        return view('tasks.index')->with(compact('userName','getTasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userName = Auth::guard('admin')->user();
        $taskReceiver = User::where('is_admin',false)->get();

        return view('tasks.create')->with(compact('userName','taskReceiver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);

        return redirect()->back()->with(Toastr::success('Thêm mới Task thành công', 'Success', ["positionClass" => "toast-bottom-right"]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userName = Auth::guard('admin')->user();
        $task = Task::find($id);
        $taskReceiver = User::where('is_admin',false)->get();

        return view('tasks.edit')->with(compact('userName','task','taskReceiver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $data = $request->validated();
        $task = Task::find($id);
        $task->update($data);

        return redirect()->back()->with(Toastr::info('Cập nhật Task thành công', 'Updated', ["positionClass" => "toast-bottom-right"]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with(Toastr::warning('Đã xóa Task', 'Deleted', ["positionClass" => "toast-bottom-right"]));
    }
}
