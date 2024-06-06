@extends('layouts.resume.app')

@section('content')

    <!-- Projects Section-->
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8" >
                    <!-- Project Card 1-->
                    @if ($projects->count())
                        @foreach ($projects as $project)
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5" >
                                <div class="card-body d-flex flex-row p-0">

                                    <div class="d-flex  flex-column p-5 w-50">
                                        <h2 class="fw-bolder">{{ ucwords($project->title) }}</h2>

                                        <p>
                                            {{ $project->description }}
                                        </p>

                                        <div class="" style="">

                                            @foreach ($project->skills as $skill)
                                                <img class="rounded-circle mx-2"
                                                    src="{{ Storage::url($skill->image->path) }}" width="25px"
                                                    height="25px" alt="{{ $skill->title }}">
                                                {{-- <span class="px-2">{{ strtoupper($skill->title) }}</span> --}}
                                            @endforeach

                                        </div>

                                        <div class="mt-3">
                                            <a href="{{ $project->url }}"
                                                class="bg-info text-light text-decoration-none fs-5 px-1 rounded "
                                                target="_blank">Project Link</a>
                                        </div>


                                    </div>

                                    <div class="shadow-lg d-flex float-end  w-50 ">
                                        <img class="img-fluid" src="{{ Storage::url($project->image->path) }}"
                                            alt="{{ $project->tilte }}" />
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <span class="fw-bold text-danger">No Projects Available Yet!!!</span>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Call to action section-->
    <section class="py-5 bg-gradient-primary-to-secondary text-white">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder"
                    href="{{ route('resume.contact') }}">Contact me</a>
            </div>
        </div>
    </section>


@endsection
