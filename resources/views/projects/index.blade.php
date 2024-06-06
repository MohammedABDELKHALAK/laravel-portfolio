@extends('layouts.app')

@section('content')
    <style>
        #projects-table a {
            float: right;
        }

            /* this style for message td in table to show just a part of messages with three points (...) */
    .description-cell {
        max-width: 600px;
        
    }
    </style>

    <div class="py-12">

        <div id="projects-table" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 50px; display: flex; align-items: center; justify-content: start;">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 10px;">
                    {{ __('Projects') }}
                </h2>
            </div>


            <div>
                {{-- to create --}}
                {{-- <button class="btn btn-primary" type="submit"><a href="{{ route('projects.create') }}">Add Projects</a></button> --}}
                <a class="btn btn-info my-3" href="{{ route('projects.create') }}">Create Projects</a>
                
                {{-- to edit --}}

                <table class="table table-bordered table-striped text-black ">

                    <tr>
                        <th>Name</th>
                        <th>Technologies</th>
                        <th>Projects Link</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Event</th>
                    </tr>


                    @if ($projects->count())
                        @foreach ($projects as $project)
                            <tr>
                                <td >{{ $project->title }}</td>

                                {{-- this td retrieve all skills are using for each project
                                to achieve that i'm using pivote table named project_skill --}}

                                {{-- if there is a other column in the pivot table project_skill all you need to do for example 
                                $project->pivot->the_column_on_the pivot_table --}}
                               
                                <td class=" d-flex flex-wrap ">
                                    @foreach ($project->skills as $skill)
                                   
                                        <div class=" d-flex flex-column align-items-center p-2 ">
                                            <img src="{{ Storage::url($skill->image->path) }}" width="20px" height="20px"
                                                alt="{{ $skill->title }}">

                                            <span style="font-size: 0.7em">{{ $skill->title }}</span>
                                        </div>
                                        @endforeach
                                </td>
                               
                                <td>
                                    <a href="{{ $project->url }}">{{ $project->url }}</a>
                                </td>

                                <td>
                                    @if ($project->image)
                                        <img src="{{ Storage::url($project->image->path) }}" width="50px" height="50px"
                                            alt="{{ $project->title }}">
                                    @else
                                        <span class="text-danger">No Image Available</span>
                                    @endif

                                </td>

                                <td class="description-cell " id="descriptionCell">
                                    {{ $project->description }}
                                    
                                </td>

                                <td>
                                    {{-- <a href=" {{ route('skills.edit', ['skill' => $skill->id]) }}"><span
                                            class="badge text-bg-warning">Edit</span></a> --}}

                                    <form class="delete inline" method="POST"
                                        action="{{ route('projects.destroy', ['project' => $project->id]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>

                                        {{-- <a onclick="event.preventDefault(); this.closest('form').submit();"
                                            href=" {{ route('skills.destroy', ['skill' => $skill->id]) }}"><span
                                                class="badge text-bg-danger">Delete</span></a> --}}

                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="fw-bold" colspan="6">There is no Projects</td>

                        </tr>
                    @endif
                </table>



            </div>
        </div>
    </div>

@endsection
