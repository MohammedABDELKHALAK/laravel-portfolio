@extends('layouts.app')

@section('content')

    {{-- @php
use App\Models\Message;
 $hasTrashedMessages = Message::onlyTrashed()->exists();
dd($hasTrashedMessages);
@endphp --}}

    <style>
        /* this style for message td in table to show just a part of messages with three points (...) */
        .message-cell {
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

        <div id="alert-container"></div>

        @if (session('status') && session('message'))
            @if (session('status') == 'success')
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @elseif(session('status') == 'warning')
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                style="height: 50px; display: flex; align-items: center; justify-content: start;">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 10px;">
                    {{ __('Dashboard') }}
                </h2>
            </div>

            {{-- @if (Auth::user() && Auth::user()->is_admin)
                <a class="btn btn-outline-info my-3" href="{{ route('resume.home') }}"> my personal page</a>
                @endif --}}

            @can('dashboard')
                <a class="btn btn-outline-info my-3" href="{{ route('resume.home') }}" target="_blank"> my personal page</a>
            @endcan

            <!-- Pagination Dropdown -->
            <form id="perPageForm" method="get" action="{{ route('pagination-perpage') }}" class="mt-3"
                style="width: 100px; float:right;">
                <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                    <option value="{{ $messages->total() }}"
                        {{ $messages->perPage() == $messages->total() ? 'selected' : '' }}> All</option>
                    <option value="10" {{ $messages->perPage() == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $messages->perPage() == 20 ? 'selected' : '' }}>20</option>
                    <option value="30" {{ $messages->perPage() == 30 ? 'selected' : '' }}>30</option>

                </select>

                {{-- <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                    @php
                        $perPageOptions = [10]; // Initial options
                        $perPage = $messages->perPage(); // Number of items per page

                        // If the number of messages exceeds the last option, add new options
                        while ($messages->total() > end($perPageOptions)) {
                            $lastOption = end($perPageOptions);
                            $perPageOptions[] = $lastOption + 10; // Increment by 10
                        }
                    @endphp
                    <option value="{{ $messages->total() }}" {{ $messages->perPage() == $messages->total() ? 'selected' : '' }}>
                        All
                    </option>
                    @foreach ($perPageOptions as $option)
                        <option value="{{ $option }}" {{ $option == $perPage ? 'selected' : '' }}>
                            {{ $option }}
                        </option>
                    @endforeach
                </select> --}}

            </form>

            <div class="d-flex justify-content-between align-items-center">
                <span class="bg-warning rounded-1 text-white px-1 "> {{ $messages->count() }} Messages</span>

                {{-- @if ($hasTrashedMessages) --}}
                {{-- <a id="restore-btn" class="btn btn-success my-3" href="{{ route('restore.all.message') }}">Restore All Trashed Messages</a> --}}
                {{-- @endif --}}

                <form id="restore-form" action="{{ route('restore.all.message') }}" method="POST">
                    @csrf
                    <button class="btn btn-success my-3"> Restore All Trashed Messages </button>
                </form>


                <a class="btn btn-danger my-3" href="{{ route('delete.all.message') }}"
                    style="width: 100px; float:right;">Delete All</a>
            </div>
            <div id="messages-container">
                <table class="table table-bordered table-striped text-white my-2">

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Messages</th>
                    </tr>

                    @if ($messages->count())
                        @foreach ($messages as $message)
                            <tr>
                                {{-- @dd($message) --}}
                                <td>{{ $message->name }} <span class="bg-dark-subtle text-muted px-1 rounded-1">
                                        {{ $message->created_at->diffForHumans() }}</span></td>
                                <td>
                                    {{ $message->email }}
                                </td>
                                <td class="message-cell">
                                    <a href="{{ route('show.message', ['id' => $message->id]) }}">
                                        {{ $message->message }}
                                    </a>
                                </td>
                                {{-- <td>
                                
                                <form class="delete inline" method="POST" action="{{ route('skills.destroy', ['skill' => $skill->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button class="btn btn-danger" type="submit">Delete</button> --}}
                                {{-- <a onclick="event.preventDefault(); this.closest('form').submit();"
                                        href=" {{ route('skills.destroy', ['skill' => $skill->id]) }}"><span
                                            class="badge text-bg-danger">Delete</span></a>

                                </form>

                            </td> --}}

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="fw-bold" colspan="3">There is no Mesages to you</td>

                        </tr>
                    @endif

                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $messages->links() }}
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
