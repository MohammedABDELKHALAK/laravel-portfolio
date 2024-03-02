@extends('layouts.app')

@section('content')

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>

            {{-- @if (Auth::user() && Auth::user()->is_admin)
                <a class="btn btn-outline-info my-3" href="{{ route('resume.home') }}"> my personal page</a>
                @endif --}}

            @can('dashboard')
                <a class="btn btn-outline-info my-3" href="{{ route('resume.home') }}"> my personal page</a>
            @endcan

            <table class="table   table-striped text-white my-2">

                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Messages</th>
                </tr>
                @if ($messages->count())
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>
                                {{ $message->email }}
                            </td>
                            <td class="message-cell">
                                <a href="{{ route('show.message', ['id' => $message->id]) }}">
                                    {{ $message->message }}
                                </a>
                            </td>
                            {{-- <td>
                                <a href=" {{ route('skills.edit', ['skill' => $skill->id]) }}"><span
                                        class="badge text-bg-warning">Edit</span></a>

                                <form class="delete inline" method="POST"
                                    action="{{ route('skills.destroy', ['skill' => $skill->id]) }}">
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

    @endsection
