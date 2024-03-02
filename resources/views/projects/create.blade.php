@extends('layouts.app')

@section('content')
    {{-- for creating --}}
    <form class="create" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
        @csrf

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

            @foreach ($skills as $skill)
                <div class="form-check">
                    <input class="form-check-input" name="skills[]" type="checkbox" value="{{ $skill->id }}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $skill->title }}
                    </label>
                </div>
            @endforeach 

            {{-- <select class="form-select" name="skills[]" multiple> --}}
                {{-- <option selected>Select Technologies</option> --}}

                {{-- @php $counter = 0; @endphp --}}
                {{-- @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->title }}</option> --}}
                    {{-- <option value="{{ $counter }}">{{$skill->title}}</option>
                    @php $counter++; @endphp --}}
                {{-- @endforeach
            </select> --}}
        </div>

        <div class="form-group mt-2">
            <label for="description"> Description: </label> <br>
            <textarea class="mt-2" name="description" id="description"
             cols="100" rows="5" placeholder="Description..."></textarea>
        </div>

        <div class="form-group mt-2"><label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control-file my-2">
        </div>
        {{-- <x-error></x-error> --}}
        <button class="btn btn-info mt-2" name="btn1" type="submit">Create Project</button>

    </form>

    <script>
    @endsection
