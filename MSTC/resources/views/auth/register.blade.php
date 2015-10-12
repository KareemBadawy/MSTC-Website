<!-- resources/views/auth/register.blade.php -->
@extends('app')

@section ('content')

<form method="POST" url="auth/register" class="form-group">

    {!! csrf_field() !!}

    <div class="form-control">
        Name
        <input type="text" name="username" value="{{ old('username') }}">
    </div>

    <div class="form-control">
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-control">
        Vertical
        <input type="text" name="vertical" value="{{ old('vertical') }}">
    </div>
    <div class="form-control">
        Password
        <input type="password" name="password">
    </div>

    <div class="form-control">
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div class="form-control">
        <input type="submit" value="Register Now">
    </div>
</form>

@stop
