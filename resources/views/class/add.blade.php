@extends('layouts.main')

@section('title')
Trang đăng ký thông tin lớp học
@stop

@section('content')

<h2 class="page-header">Đăng ký thông tin lớp học</h2>

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
<form action="{{ asset('class/add') }}" method="post" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="control-label col-sm-2">Tên lớp</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="classname" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Số lượng sinh viên</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" name="amount" value=""/>
        </div>
    </div>
    <div class="form-group">
        <label>&nbsp</label>
        <input type="submit" name="ok" value="Thêm lớp" class="btn"/>
    </div>
</form>
<script>
 $("#form_register").validate({
            rules:{
                classname:{
                    required:true,
                    maxlength:6
                },
                amount:{
                    required:true,
                    maxlength:6
                },
            },messages:{
                username:{
                    required:'Vui lòng nhập tên lớp',
                    minlength:'Vui lòng nhập nhiều nhất 6 kí tự'
                },
                address:{
                    required:'Vui lòng nhập số lượng sinh viên',
                    minlength:'Vui lòng nhập nhiều nhất 6 kí tự'
                }
            }
        });
</script>
@stop