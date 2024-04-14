@extends('layouts.resume.app')

@section('content')
    <!-- Page Content-->
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Resume</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Experience Section-->
                <section>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h2 class="text-primary fw-bolder mb-0">Experience</h2>
                        <!-- Download resume button-->
                        <!-- Note: Set the link href target to a PDF file within your project-->
                        <a class="btn btn-primary px-4 py-3" href="{{ route('dowloandPDF') }}">
                            <div class="d-inline-block bi bi-download me-2"></div>
                            Download Resume
                        </a>
                    </div>
                    <!-- Experience Card 1-->
                    @if ($profile && $profile->experiences)
                        @forelse ($profile->experiences as $experience)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="p-4 rounded-4" style="background-color: rgba(134, 129, 129, 0.050)">

                                                <div class="text-primary fw-bolder mb-2">
                                                    {{ $experience->is_currently_working
                                                        ? \Carbon\Carbon::parse($experience->start_job)->format('Y-m') . ' - ' . 'Present'
                                                        : \Carbon\Carbon::parse($experience->start_job)->format('Y-m') .
                                                            ' - ' .
                                                            \Carbon\Carbon::parse($experience->end_job)->format('Y-m') }}
                                                </div>

                                                <div class="small fw-bolder">{{ $experience->job }}</div>
                                                <div class="small text-muted">{{ $experience->company }}</div>

                                                <div class="small text-muted">
                                                    {{ $experience->country . ', ' . $experience->city }}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div> {{ $experience->details }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <span class="fw-bold text-danger">No prior distination job have yet</span>
                                </div>
                            </div>
                        @endforelse
                    @else
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <span class="fw-bold text-danger">No Experiences Available Yet</span>
                            </div>
                        </div>
                    @endif

                </section>

                <!-- Education Section-->
                <section>
                    <h2 class="fw-bolder mb-4" style="color: rgb(244, 27, 110)">Education</h2>
                    <!-- Education Card 1-->
                    @if ($profile && $profile->education)
                        @forelse ($profile->education as $education)
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="p-4 rounded-4" style="background-color: rgba(134, 129, 129, 0.050)">

                                                <div class="fw-bolder mb-2" style="color: rgb(244, 27, 110)">
                                                    {{ $education->is_currently_educate
                                                        ? \Carbon\Carbon::parse($education->start_educate)->format('Y-m') . ' - ' . 'Present'
                                                        : \Carbon\Carbon::parse($education->start_educate)->format('Y-m') .
                                                            ' - ' .
                                                            \Carbon\Carbon::parse($education->end_educate)->format('Y-m') }}
                                                </div>

                                                <div class="mb-2">
                                                    <div class="small fw-bolder">{{ $education->name}}</div>
                                                    <div class="small text-muted">{{ $education->country .', '. $education->city }}Fairfield, NY</div>
                                                </div>
                                                <div class="fst-italic">
                                                    <div class="small text-muted">{{ $education->level}}</div>
                                                    {{-- <div class="small text-muted">Web Development</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div>{{ $education->details }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <span class="fw-bold text-danger">No prior Education have yet</span>
                                </div>
                            </div>
                        @endforelse
                    @else
                        <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-5">
                                <span class="fw-bold text-danger">No Education Available Yet</span>
                            </div>
                        </div>
                    @endif
                </section>
                <!-- Divider-->
                <div class="pb-5"></div>
                <!-- Skills Section-->
                <section>
                    <!-- Skillset Card-->
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <!-- Professional skills list-->

                            <!-- Languages list-->
                            <div class="mb-0">
                                <div class="d-flex align-items-center mb-4">
                                    <div
                                        class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                        <i class="bi bi-code-slash"></i>
                                    </div>
                                    <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Skills</span></h3>
                                </div>

                                <dv class="row row-cols-1 row-cols-md-3 mb-4">

                                    @if ($profile && $profile->skills)
                                        @foreach ($profile->skills as $skill)
                                            <div
                                                class="col mb-4 mb-md-0 mt-3 d-flex align-items-center justify-content-start ">

                                                <div class="rounded-4 p-2 w-100"
                                                    style="background-color: rgba(134, 129, 129, 0.050)">

                                                    <img class="rounded-circle"
                                                        src="{{ Storage::url($skill->image->path) }}" width="30px"
                                                        height="30px" alt="{{ $skill->title }}">

                                                    <span class="px-2">{{ strtoupper($skill->title) }}</span>
                                                    {{-- <span class="">{{ ucwords($skill->title) }}</span> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="fw-bold text-danger">Nothing</span>
                                    @endif



                            </div>


                        </div>

                    </div>
            </div>

            </section>

        </div>
    </div>
    </div>
@endsection
