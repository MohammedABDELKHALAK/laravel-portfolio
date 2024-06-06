@extends('layouts.app')

@section('content')

<style>
#skills-table a{
float: right;
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

            <div id="skills-table" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 50px; display: flex; align-items: center; justify-content: start;">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 10px;">
                        {{ __('Skills') }}
                    </h2>
                </div>

                <a class="btn btn-primary my-3" href=" {{ route('skills.create') }} ">Create Skills</a>
                <a class="btn btn-warning my-3 mx-2" href=" {{ route('skills.exportpdf') }} ">Export PDF Skills</a>

                <table class="table   table-striped text-white my-2">

                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Event</th>
                    </tr>
                    @if ($skills->count())
                        @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $skill->title }}</td>
                                <td>
                                    @if ($skill->image)
                                        <img src="{{ Storage::url($skill->image->path) }}" width="30px" height="30px"
                                            alt="{{ $skill->title }}">
                                    @endif
                                </td>
                                <td>
                                    <a href=" {{ route('skills.edit', ['skill' => $skill->id]) }}"><span
                                            class="badge text-bg-warning">Edit</span></a>

                                    <form class="delete inline" method="POST"
                                        action="{{ route('skills.destroy', ['skill' => $skill->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button class="btn btn-danger" type="submit">Delete</button> --}}
                                        <a onclick="event.preventDefault(); this.closest('form').submit();"
                                            href=" {{ route('skills.destroy', ['skill' => $skill->id]) }}"><span
                                                class="badge text-bg-danger">Delete</span></a>

                                    </form>


                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="fw-bold" colspan="3">There is no Skills</td>

                        </tr>
                    @endif

                </table>
 <!-- Pagination Links -->
 <div class="d-flex justify-content-center">
    {{ $skills->links() }}
</div>
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
