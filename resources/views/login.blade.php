@extends('main')

@section('title')
    Trang đăng nhập
@stop

@section('content')
    <div class="row text-center">
        <h2>Trang đăng nhập</h2>
    </div>
    <div class="row">
        @if (count($errors) > 0)
            @if (is_array($errors))
            <div class="alert alert-danger">
                <strong>Whoops</strong> There were some problems with your <br/> <br/>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @else
            <div class="alert alert-danger">
                <strong>Whoops</strong> There were some problems with your <br/> <br/>
                <ul>
                    <li>{{ $errors }}</li>
                </ul>
            </div>
            @endif
        @endif
        <form action="{{asset('login')}}" method="post" id="form_register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="username" id="username" placeholder="Username or Email" class="form-control"/>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
        </form>
    </div>
@endsection