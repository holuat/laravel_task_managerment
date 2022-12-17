@extends('layout')
@section('content')

<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mới Task
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
                        Toastr::error('Không thể thêm mới Task','Failed',["positionClass" => "toast-bottom-right"]);
                    @endphp
                @endif
                </div>
                <div class="position-center">
                    <form role="form" action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <input type="hidden"name="task_assigner"value="{{ $userName->name }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Người nhận task</label>
                            <select name="task_receiver"class="form-control">
                                @foreach($taskReceiver as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thời hạn</label>
                            <input type="date" name="expired_at"placeholder="mm-dd-yyyy">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên task</label>
                            <input name="task_name"value="{{ old('task_name') }}" class="form-control" placeholder="Tên task">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung chi tiết task</label>
                            <textarea name="task_desc" id="ckeditor_task_desc" style="resize:none" rows="5"class="form-control" placeholder="Nội dung chi tiết task"required>{{ old('task_desc') }}</textarea>
                        </div>
                        <button type="submit"name="add_task" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection