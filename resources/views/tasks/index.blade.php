@extends('layout')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Danh Sách Tasks
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th style="width:20px;">
                <label class="i-checks m-b-none">
                    <input type="checkbox">
                </label>
            </th>
            <th><b>Tên người giao task</b></th>
            <th><b>Tên người nhận task</b></th>
            <th><b>Thời hạn</b></th>
            <th><b>Tên Task</b></th>
            <th><b>Nội dung chi tiết Task</b></th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 1 
          @endphp
          @foreach($getTasks as $tasks)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $tasks->task_assigner }}</td>
            <td><span class="text-ellipsis">{{ $tasks->user->name }}</span></td>
            <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($tasks->expired_at)) }}</span></td>
            <td><span class="text-ellipsis">{{ $tasks->task_name }}</span></td>
            <td><span class="text-ellipsis">{!! $tasks->task_desc !!}</span></td>
            <td>
              @if(auth()->user()->is_admin == true)
                <a href="{{ route('tasks.edit',[$tasks->id]) }}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <form action="{{ route('tasks.destroy',[$tasks->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="fa fa-trash"onclick="return confirm('Bạn chắc chắn muốn xóa Task {{ $tasks->task_name }} không?')"></button>
                </form>
              @endif
            </td>
          </tr>  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection