@extends('layouts.main')

@section('title')
Trang danh sách sinh viên
@stop

@section('content')
<h2 class="page-header">Danh sách sinh viên</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Choose Class</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

    @if (isset($data))
        @foreach($data as $item)
            <tr>
                <td>{{ (isset($item['fullname'])) ? $item['fullname'] : '' }}</td>
                <td>{{ (isset($item['email'])) ? $item['email'] : '' }}</td>
                <td>{{ (isset($item['address'])) ? $item['address'] : '' }}</td>
                <td>{{ (isset($item['phone'])) ? $item['phone'] : '' }}</td>
                <td>{{ (isset($item['gender']) && $item['gender'] == 1) ? 'Male' : 'Fmale' }}</td>
                <td>{{ (isset($item['class'])) ? $item['class'] : '' }}</td>
                <td>
                    <a class="btn-link" href="{{url('class/selectclass/'.$item['id'])}}">Select Class</a>
                </td>
                <td>
                    <a class="btn-link" href="{{asset('student/edit')}}/{{$item['id']}}">Edit</a>
                </td>
                <td>
                    <a class="btn-link" href="{{asset('student/destroy')}}/{{$item['id']}}">Delete</a>
                </td>
            </tr>
        @endforeach
    @endif

        </tbody>
    </table>
</div>

    <a class="btn-link" href="{{ asset('student/insert') }}">Them sinh vien</a>
@stop