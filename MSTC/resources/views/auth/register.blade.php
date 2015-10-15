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
        <div>
        Vertical:
            <input type="radio" name="vertical" value="Technical">Technical
            <input type="radio" name="vertical" value="Media and Marketing">Media and Marketing
            <input type="radio" name="vertical" value="H.R.">H.R.
            <input type="radio" name="vertical" value="Operations">Operations
        </div>
    </div>

    <div class = "form-control">
        <div>
            Role:
            <input type="radio" name="role" value="President">President
            <input type="radio" name="role" value="Head">Head
            <input type="radio" name="role" value="ViceHead">Vice Head
            <input type="radio" name="role" value="Member">Member
        </div>
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
