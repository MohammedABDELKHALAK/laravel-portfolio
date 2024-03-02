@extends('layouts.app')

@section('content')

    <div class="container">
        <h1> Add New Skill</h1>
        {{-- enctype="multipart/form-data" attribute is important to upload files --}}

        {{-- for creating --}}
        <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title"> Title: </label>
                <input class="form-control mt-2" name="title" id="title" type="text" value="{{ old('title') }}">
                {{-- <input class="form-control mt-2" name="userid" id="title" type="hidden" value="{{ Auth::user()->id }}"> --}}
            </div>

            <div class="form-group"><label for="picture">Picture:</label><br>
                <input type="file" name="picture" id="picture" class="form-control-file my-2">
            </div>

            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}

            {{-- insert some input here --}}
            <button class="btn btn-primary" type="submit">Add Skill</button>
        </form>
    </div>

@endsection
