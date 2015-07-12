@extends('layouts.main')

@section('title')
Trang thông tin lớp học
@stop

@section('content')

<h2 class="page-header">Thông tin lớp học</h2>

<!-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 -->
    <span class="error text-center">
        {{ isset($result) ? $result : "" }}
    </span>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên lớp</th>
                    <th>Số sinh viên</th>
                    <th>Danh sách sinh viên</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $class)
                <tr>
                    <td>{{$class['classname']}}</td>
                    <td>{{$class['amount']}}</td>
                    <td><a href="{{asset('class/liststudent')}}/{{$class['id']}}" class="btn-link">Danh sách</a></td>
                    <td><a href="{{asset('class/edit')}}/{{$class['id']}}" class="btn-link">Sửa</a></td>
                    <td><a href="{{asset('class/delete')}}/{{$class['id']}}" class="btn-link">Xóa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop