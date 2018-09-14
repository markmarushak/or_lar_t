@extends('layouts.admin.app')

@section('content')

    <form action="/settings-service/api/send" method="post">
        <input type="text" name="email-api" placeholder="enter your email.." required value="">

        <input type="password" name="password-api" placeholder="enter your password.." required value="">

        <button type="submit">
            Save API
        </button>

    </form>

@endsection