@extends('layouts.app')

@section('title')
Login 
@endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a><b>CWA COLOR CARD</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body box-custom">
            <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    @if ($errors->has('username'))
                        <div class="alert alert-danger">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password ">

                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
</div>
@endsection
