@extends('layouts.app')
@section('content')
<h1>Crud People</h1>
<h3>Please sign in to continue</h3>
<br>

@if($errors)
    @foreach($errors->getMessages() as $message)
        <div class="alert alert-danger" role="alert">
            {{ $message[0] }}
        </div>
    @endforeach
@endif

<form method="post" action="{{ route('login.post') }}">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<br>
<p>You can create new user <a href="{{ route('register') }}">here</a></p>
@endsection('content')
