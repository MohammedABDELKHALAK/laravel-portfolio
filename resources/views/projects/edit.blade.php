@extends('layouts.app')

@section('content')
    <form class="update" method="POST" action="{{ route('projects.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- <div class="form-group mt-2">
        <label for="title"> Title: </label>
        <input class="form-control mt-2" name="title" id="title" type="text" placeholder="Update Title"  value="{{ old('title', $post->title) }}">
    </div>

    <div class="form-group mt-2">
        <label for="content"> Content: </label>
        <input class="form-control mt-2" name="content" id="content" type="text" placeholder="Update Content" value="{{ old('content', $post->content ) }}">
    </div> --}}
        <div class="form-group mt-2">
            <label for="title"> Title: </label>
            <input class="form-control mt-2" name="title" id="title" type="text" placeholder="Title..." autofocus
                required>
        </div>



        <div class="form-group mt-2">
            <label for="url"> URL: </label>
            <input class="form-control mt-2" name="url" id="url" type="text" placeholder="Url..." required>
        </div>


        <div class="form-group mt-2">
            <select class="form-select" multiple aria-label="Multiple select example">
                <option selected>Select Technologies</option>
                @foreach ($skills as $skill)

                <option value="{{ $skill->id }}">{{$skill->name}}</option>
                {{-- <option value="{{ key($skill->name) }}">{{$skill->name}}</option> --}}

                @endforeach
                
                {{-- <option value="2">Two</option>
                <option value="3">Three</option> --}}
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="description"> Description: </label>
            <input class="form-control mt-2" name="description" id="description" type="text" placeholder="Description..."
                required>
        </div>

        <div class="form-group"><label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control-file my-2">
        </div>
        {{-- <x-error></x-error> --}}
        <button class="btn btn-warning mt-2" name="btn1" type="submit">Add Project</button>

    </form>
@endsection
