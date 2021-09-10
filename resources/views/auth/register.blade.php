@extends('backend.layouts.app')

@section('content')



<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1>{{ env('APP_NAME', 'Read On Net') }}</h1>
                        <p class="text-muted">Register</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="Name" value="{{ old('name', null) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>

                            <input name="email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Email" value="{{ old('email', null) }}">

                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input name="password" id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus placeholder="New Password" value="{{ old('password', null) }}">

                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>

                        <div class="row">
                            <div class="col-6 ">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-6 text-right ">
                                <a class="btn btn-link px-0  " href="{{ route('login') }}">
                                    Already Registered? LogIn
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
