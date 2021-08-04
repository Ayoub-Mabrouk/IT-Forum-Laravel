@extends('layouts.app')

@section('content')
    <h2>Sing-in IT-Forum</h2>
    {{--<form action="#" method="post" class="form-box">--}}
    <form method="POST" action="{{ route('login') }}" class="form-box">
        @csrf
        <div class="group-form">
            <label for="email" class="label-form">
                Email :
            </label>
            <input type="email" class="input-form" id="email" placeholder="Address email" name="email">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="group-form">
            <label for="password" class="label-form">
                Password :
            </label>
            <input type="password" class="input-form" id="password" placeholder="Password" name="password">
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="button-con">
            <button type="submit">Login</button>
        </div>
    </form>
    <div class="links">
        <div class="link-login"><a href="{{route('password.request')}}">forget password?</a></div>
        <div class="link-login"><a href="{{route('register')}}">don't have an account?</a></div>
    </div>
@endsection
