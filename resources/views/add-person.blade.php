@extends('layouts.people')
@section('content')
    <h1>Adding new person</h1>
    <h3>Please prefill your data</h3>
    <br>

    @if(isset($errors))
        @foreach($errors->getMessages() as $message)
            <div class="alert alert-danger" role="alert">
                {{ $message[0] }}
            </div>
        @endforeach
    @endif

    <form method="post" action="{{ route('people.create') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input id="surname" type="text" name="surname" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile number:</label>
            <input id="mobile_number" type="text" name="mobile_number" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth date:</label>
            <input id="birth_date" type="date" name="birth_date" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="south_african_id_number">South african id number:</label>
            <input id="south_african_id_number" type="text" name="south_african_id_number" class="form-control" value="">
        </div>

        <p>
        <div>Choose language</div>
        <select name="language_id" id="language" size="5">
            @if (isset($languages))
                @foreach($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->code }}</option>
                @endforeach
            @endif
        </select>
        </p>

        <p>
        <div>Choose interests</div>
        <select name="interests[]" id="interests" multiple size="5">
            @if (isset($interests))
                @foreach($interests as $interest)
                    <option value="{{ $interest->id }}">{{ $interest->title }}</option>
                @endforeach
            @endif
        </select>
        </p>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
