@extends('layouts.main')

@section('title')
Trang danh sách sinh viên trong lớp học
@stop

@section('content')

<h2 class="page-header">Danh sách sinh viên của lớp học</h2>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{{$error}}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Tên sinh viên
                </th>
                <th>
                    {{{isset($user->fullname) ? $user->fullname : ''}}}
                </th>
            </tr>
        </thead>
    </table>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên lớp</th>
            <th>Số lượng</th>
            <th>Danh sách sinh viên</th>
            <th>Chọn lớp</th>
        </tr>
        </thead>
        <tbody>

        @if (isset($data))
            @foreach($data as $item)
                <tr>
                    <td>{{ (isset($item->id)) ? $item->id : '' }}</td>
                    <td>{{ (isset($item->classname)) ? $item->classname : '' }}</td>
                    <td>{{ (isset($item->amount)) ? $item->amount : '' }}</td>
                    <td>{{ (isset($item['####'])) ? $item['####'] : '' }}</td>
                    <td>
                        <div class="radio">
                          <label><input type="radio" name="classradio" value="{{ (isset($item->id)) ? $item->id : '' }}">Chọn</label>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>    
        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary btn-block">Gửi thông tin</button>
            </div>
        </div>
</div> <!-- .table-responsive -->

@stop