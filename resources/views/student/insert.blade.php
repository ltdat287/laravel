@extends('layouts.main')

@section('title')
Trang đăng ký thông tin sinh viên
@stop

@section('content')

<h2 class="page-header">Đăng ký thông tin sinh viên</h2>

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
<form action="{{ asset('student/insert') }}" method="post" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="control-label col-sm-2">Ho va Ten</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="fullname" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Email</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="email" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Que Quan</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="address" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Dien Thoai</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="phone" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Gioi tinh</label>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="gender" value="1"/>Nam</label>
            <label class="radio-inline"><input type="radio" name="gender" value="2"/>Nu</label>
        </div>
    </div>
    <div class="form-group">
        <label>&nbsp</label>
        <input type="submit" name="ok" value="Them moi" class="btn"/>
    </div>
</form>
<script>
 $("#form_register").validate({
            rules:{
                fullname:{
                    required:true,
                    minlength:6
                },
                address:{
                    required:true,
                    minlength:6
                },
                phone:{
                    required:true,
                    numberic:9
                },
                email:{
                    required:true,
                    email:true
                }
                gender:{
                    notEmpty:true,
                }
            },messages:{
                username:{
                    required:'Vui lòng nhập username',
                    minlength:'Vui lòng nhập ít nhất 6 kí tự'
                },
                address:{
                    required:'Vui lòng nhập dia chi',
                    minlength:'Vui lòng nhập ít nhất 6 kí tự'
                },
                phone:{
                    required:'Vui lòng nhập phone',
                    minlength:'Vui lòng nhập ít nhất 9 kí tự'
                },
                email:{
                    required:'Vui lòng nhập địa chỉ email',
                    email:'Email không hợp lệ'
                }
                gender:{
                    notEmpty:'Vui lòng nhập',
                }
            }
        });
</script>
@stop