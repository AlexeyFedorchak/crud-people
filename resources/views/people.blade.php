@extends('layouts.people')
@section('content')
    <div>To add new person please click <a href="{{ route('people.create.show') }}">here</a></div>
    <br>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <br>
    @if ($people)
        <ul class="list-group">
            @foreach($people as $key => $person)
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <a href="{{ route('people.show', ['people' => $person]) }}">{{ $person->name }}</a>
                        <small>(created by {{ $person->creator->name }})</small>
                    </div>


                    <a href="{{ route('people.delete', ['people' => $person]) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
