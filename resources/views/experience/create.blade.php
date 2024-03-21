@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Add New Experience</h1>
        {{-- enctype="multipart/form-data" attribute is important to upload files --}}

        {{-- for creating --}}
        <form method="POST" action="{{ route('experience.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="mt-2">
                    <label for="job_name"> Job Name: </label>
                    <input class="form-control mt-2" name="job" id="job_name" type="text" required>
                </div>

                <div class="mt-2">
                    <label for="company"> Company: </label>
                    <input class="form-control mt-2" name="company" id="company" type="text" required>
                </div>

                <div class="mt-2">
                    <label for="start_job"> Start Job: </label>
                    <input class="form-control mt-2" name="start_job" id="start_job" type="date" required>
                </div>

                <div class="mt-2">
                    <label for="end_job"> End Job: </label>
                    <input class="form-control mt-2" name="end_job" id="end_job" type="date" required>
                </div>

                <div class="mt-2">
                    <input style="border: 1px black solid;" class="form-check-input" type="checkbox" name="end_job_checkbox"
                        value="" id="end_job_checkbox">
                    <label class="form-check-label" for="end_job_checkbox">
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
            <button class="btn btn-primary mt-3" type="submit">Add Experience</button>
        </form>
    </div>

    <script>
        document.getElementById('end_job_checkbox').addEventListener('change', function() {
            var endJobInput = document.getElementById('end_job');
            if (this.checked) {
                endJobInput.disabled = true;
                endJobInput.value = ''; // Clear end date if currently working
            } else {
                endJobInput.disabled = false;
            }
        });
    </script>
@endsection
