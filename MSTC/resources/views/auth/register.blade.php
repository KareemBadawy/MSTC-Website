<!-- resources/views/auth/register.blade.php -->
@extends('app')

@section ('content')

<form method="POST" action="auth/register" class="form-group">
    {!! csrf_field() !!}

    <div class="form-control">
        Name
        <input type="text" name="username" value="{{ old('username') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        Vertical
        <input type="text" name="vertical" value="{{ old('vertical') }}">
    </div>
    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <input type="submit" value="Register Now">
    </div>
</form>

@stop
