@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <h1>Update Skill</h1>
        <form method="POST" action=" {{ route('skills.update', [ 'skill' => $skill->id ] ) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mt-2">
                <label for="title"> Title: </label>
                <input class="form-control mt-2" name="title" id="title" type="text" placeholder="Update Title"  value="{{ old('title', $skill->title) }}">
            </div>

           {{-- @if ($errors->any())
                 <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}
    
            <div class="form-group"><label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control-file my-2" >
            </div>
            {{-- <x-error></x-error> --}}
            <button class="btn btn-warning mt-2" name="btn1" type="submit">Update Skill</button>
        </form>
    </div>
@endsection

