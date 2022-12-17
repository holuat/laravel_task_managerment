@extends('layout')
@section('content')

<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật Task
            </header>
            <div class="panel-body">
                <div class="panel-body-error">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @php
                        Toastr::error('Không thể cập nhật Task','Failed',["positionClass" => "toast-bottom-right"]);
                    @endphp
                @endif
                </div>
                <div class="position-center">
                    <form role="form" action="{{ route('tasks.update',[$task->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người giao task</label>
                            <input type="text"name="task_assigner"value="{{ $task->task_assigner }}"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người nhận task</label>
                            <select name="task_receiver"class="form-control">
                                @foreach($taskReceiver as $receiver)
                                    @if($receiver->id == $task->task_receiver)
                                        <option selected value="{{ $receiver->id }}">{{ $receiver->name }}</option>
                                    @else
                                        <option value="{{ $receiver->id }}">{{ $receiver->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thời hạn</label>
                            <input type="date" name="expired_at"value="{{ $task->expired_at }}"placeholder="mm-dd-yyyy">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên task</label>
                            <input name="task_name"value="{{ $task->task_name }}" class="form-control" placeholder="Tên task">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung chi tiết task</label>
                            <textarea name="task_desc" id="ckeditor_task_desc" style="resize:none" rows="5"class="form-control" placeholder="Nội dung chi tiết task"required>{{ $task->task_desc }}</textarea>
                        </div>
                        <button type="submit"name="update_task" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection