@extends('main')

@section('title')
    Trang đăng ký
@stop

@section('content')
    <div class="row text-center">
        <h2>Trang đăng ký</h2>
    </div>
    <div class="row">
        @if (isset($error) || isset($erroremail) || isset($erroruser))
            <div class="alert alert-danger">
                <strong>Whoops</strong> There were some problems with your <br/> <br/>
                @if (count($error) > 0)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
                @endif
                @if (count($erroruser) > 0)
                <ul>
                    <li>{{ $erroruser }}</li>
                </ul>
                @endif
                @if (count($erroremail) > 0)
                <ul>
                    <li>{{ $erroremail }}</li>
                </ul>
                @endif
            </div>
        @endif
        <form action="{{asset('register')}}" method="post" id="form_register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="username" id="username" placeholder="Username" class="form-control"/>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-Password" class="form-control"/>
            <input type="email" name="email" id="email" placeholder="Email" class="form-control"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>
        </form>
        <script type="text/javascript">
        $("#form_register").validate({
            rules:{
                username:{
                    required:true,
                    minlength:3
                },
                password:{
                    required:true,
                    minlength:6
                },
                password_confirmation:{
                    equalTo:"#password"
                },
                email:{
                    required:true,
                    email:true
                }
            },messages:{
                username:{
                    required:'Vui lòng nhập username',
                    minlength:'Vui lòng nhập ít nhất 3 kí tự'
                },
                password:{
                    required:'Vui lòng nhập password',
                    minlength:'Vui lòng nhập ít nhất 6 kí tự'
                },
                password_confirmation:{
                    equalTo:'Vui lòng nhập đúng mật khẩu'
                },
                email:{
                    required:'Vui lòng nhập địa chỉ email',
                    email:'Email không hợp lệ'
                }
            }
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </div>
@stop