@extends('layouts.app')

@section('content')

    <style>
        #experiences-table a {
            float: right;
        }

        /* this style for message td in table to show just a part of messages with three points (...) */
        .details-cell {
            max-width: 200px;
            /* Set the maximum width for the cell */
            white-space: nowrap;
            /* Prevent text from wrapping */
            overflow: hidden;
            /* Hide the overflowing text */
            text-overflow: ellipsis;
            /* Display ellipsis (...) for overflow */
        }
    </style>

    <div class="py-12">

        <div class="container">

            {{-- alert create update and delete --}}
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('warning') }}
                </div>
            @elseif (session('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ session('danger') }}
                </div>
            @endif

            <div id="experiences-table" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Skills') }}
                    </h2>
                </div>

                <a class="btn btn-primary my-3" href=" {{ route('experience.create') }} ">Create Experiences</a>

                <table class="table   table-striped text-white my-2">

                    <tr>
                        <th>Job Name</th>
                        <th>Company</th>
                        <th>Start Job</th>
                        <th>End Job</th>
                        <th>Country & City</th>
                        <th>Details</th>
                        <th>Years</th>
                        <th>Event</th>
                    </tr>
                    @if ($experiences->count())
                        @foreach ($experiences as $experience)
                            <tr>
                                <td>{{ $experience->job }}</td>
                                <td>{{ $experience->company }}</td>
                                <td>{{ $experience->start_job }}</td>
                                {{--   i choose this way to learn other ways so {!! ... !!} this to show html
                                       with retrevieving data in same time
                                       but you need to use e(Variable) --}}
                                <td>{!! $experience->is_currently_working ? '<span>Currently Working</span>' : e($experience->end_job) !!}</td>

                                <td>{{ $experience->country . ', ' . $experience->city }}</td>
                                <td class="details-cell">{{ $experience->details }}</td>
                                <td class="details-cell">
                                    @php

                                        $start_job = Carbon\Carbon::parse($experience->start_job);
                                        $end_job = $experience->is_currently_working
                                            ? now()
                                            : Carbon\Carbon::parse($experience->end_job);

                                        $duration = $start_job->diffForHumans($end_job, true, true);

                                    @endphp
                                    {{ $duration }}
                                </td>

                                <td>
                                    {{-- <a href=" {{ route('skills.edit', ['skill' => $skill->id]) }}"><span
                                                class="badge text-bg-warning">Edit</span></a> --}}

                                    {{-- <form class="delete inline" method="POST"
                                            action="{{ route('skills.destroy', ['skill' => $skill->id]) }}">
                                            @csrf
                                            @method('DELETE') --}}
                                    {{-- <button class="btn btn-danger" type="submit">Delete</button> --}}
                                    {{-- <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                href=" {{ route('skills.destroy', ['skill' => $skill->id]) }}"><span
                                                    class="badge text-bg-danger">Delete</span></a> --}}

                                    {{-- </form> --}}


                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="fw-bold" colspan="8">There is no experience</td>

                        </tr>
                    @endif

                </table>

            </div>

        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var autoCloseAlert = document.querySelector('.alert');

        if (autoCloseAlert) {
            setTimeout(function() {
                autoCloseAlert.classList.add('d-none');
            }, 3000); // Adjust the time as needed (3000 milliseconds = 3 seconds)
        }
    });
</script>
