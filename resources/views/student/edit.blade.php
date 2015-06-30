@extends('layouts.main')

@section('title')
Trang đăng ký thông tin sinh viên
@stop

@section('content')

    <h2 class="page-header"> Trang sửa thông tin sinh viên</h2>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <span class="error text-center">
        {{ isset($result) ? $result : "" }}
    </span>

    <form action="{{asset('student/edit')}}/{{ $data['id'] }}" method="post" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label col-sm-2">Ho va Ten</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="fullname" value="<?php echo $data['fullname']; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Email</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="email" value="<?php echo $data['email']; ?>"/>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Que quan</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="address" value="<?php echo $data['address']; ?>"/>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">So dien thoai</label>

            <div class="col-sm-10">
                <input class="form-control" type="text" name="phone" value="<?php echo $data['phone']; ?>"/>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Gioi tinh</label>

            <label class="radio-inline">
                <input type="radio" name="gender" value="1" <?php if ($data['gender'] == 1) {
                    echo 'checked';
                } ?>/>Nam
            </label>

            <label class="radio-inline">
                <input type="radio" name="gender" value="2" <?php if ($data['gender'] == 0) {
                    echo 'checked';
                } ?>/>Nu
            </label>
        </div>
        <label class="control-label col-sm-2">&nbsp</label>
        <input type="submit" name="ok" value="Sua" class="btn"/>
    </form>
@stop