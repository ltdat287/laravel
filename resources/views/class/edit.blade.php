@extends('layouts.main')

@section('title')
Trang sửa thông tin lớp học
@stop

@section('content')

<h2 class="page-header">Sửa thông tin lớp học</h2>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('class/edit/'.$id) }}" method="post" role="form" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="control-label col-sm-2">Tên lớp</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="classname" value="{{{$result->classname}}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Số lượng sinh viên</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" name="amount" value="{{{$result->amount}}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">&nbsp</label>
        <div class="col-sm-10">
            <input type="submit" name="ok" value="Sửa" class="btn btn-block"/>
        </div>
    </div>
</form>

<script>
 $("#form_register").validate({
            rules:{
                classname:{
                    required:true,
                    maxlength:6,
                    minlength:2
                },
                amount:{
                    required:true,
                    maxlength:6,
                    minlength:2
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