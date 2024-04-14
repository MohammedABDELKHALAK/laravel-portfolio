@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Add New Education</h1>
        {{-- enctype="multipart/form-data" attribute is important to upload files --}}

        {{-- for creating --}}
        <form method="POST" action="{{ route('education.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="mt-2">
                    <label for="job_name"> School Name: </label>
                    <input class="form-control mt-2" name="name" id="school_name" type="text" required>
                </div>

                <div class="mt-2">
                    <label for="company"> Level: </label>
                    <input class="form-control mt-2" name="level" id="company" type="text" required>
                </div>

                <div class="mt-2">
                    <label for="start_educate"> Start Educate: </label>
                    <input class="form-control mt-2" name="start_educate" id="start_educate" type="date" required>
                </div>

                <div class="mt-2">
                    <label for="end_educate"> End Educate: </label>
                    <input class="form-control mt-2" name="end_educate" id="end_educate" type="date" required>
                </div>

                <div class="mt-2">
                    <input style="border: 1px black solid;" class="form-check-input" name="end_educate_checkbox" type="checkbox" 
                        value="" id="end_educate_checkbox">
                    <label class="form-check-label" for="end_educate_checkbox">
                        Until Now
                    </label>
                </div>

                <div class="mt-2">
                    <label for="country"> Country: </label>
                    <input class="form-control mt-2" name="country" id="country" type="text" required>
                </div>

                <div class="mt-2">
                    <label for="city"> City: </label>
                    <input class="form-control mt-2" name="city" id="city" type="text" required>
                </div>

                <div class="mt-2">
                    <label for="details"> Details: </label>
                    <textarea name="details" id="details" cols="30" rows="10" required></textarea>
                </div>

                {{-- <input class="form-control mt-2" name="userid" id="title" type="hidden" value="{{ Auth::user()->id }}"> --}}
            </div>

            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}

            {{-- insert some input here --}}
            <button class="btn btn-primary mt-3" type="submit">Add Education</button>
        </form>
    </div>

    {{-- this script to mute end_educate and make unclickable if i check the checkbox --}}
    <script>
        document.getElementById('end_educate_checkbox').addEventListener('change', function() {
            var endEducateInput = document.getElementById('end_educate');
            if (this.checked) {
                endEducateInput.disabled = true;
                endEducateInput.value = ''; // Clear end date if currently working
            } else {
                endEducateInput.disabled = false;
            }
        });
    </script>
@endsection
