@extends('layouts.app')
@section('content')
    <h1>Crud People</h1>
    <h3>Please fill your data to continue</h3>
    <br>
    <form method="post" action="{{ route('register.post') }}">
        @csrf
        <div class="form-group">
            <input name="name" type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <br>
    <p>You can login <a href="{{ route('login') }}">here</a></p>

@endsection('content')
