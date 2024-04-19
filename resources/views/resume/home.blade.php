@extends('layouts.resume.app')

@section('content')
    <style>
        .aaep {

            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 10px;
            margin-top: -10px;
            /* background-color: brown */
        }

        .aaep p {
            font-size: 13px;
            margin-bottom: 0px;
        }

        .aaep span {
            font-weight: bolder;
            text-decoration: underline;
        }
    </style>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-xxl-5">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
                        <div class="badge bg-gradient-primary-to-secondary text-white mb-4 fs-4 ">
                            <div class="text-uppercase">laravel developer</div>
                        </div>
                        <div class="fs-3 fw-light text-muted">Hi! I AM</div>
                        <h1 class="display-3 fw-bolder mb-5"><span
                                class="text-gradient d-inline">{!! $profile->name ?? '<span> Nothing </span>' !!}</span>
                        </h1>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
                                href="{{ route('resume.resume') }}">Resume</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder"
                                href={{ route('resume.project') }}>Projects</a>
                        </div>
                    </div>
                </div>
                {{-- next div for image --}}
                <div class="col-xxl-7">
                    <!-- Header profile picture-->
                    <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                        <div class="profile bg-gradient-primary-to-secondary">

                            <img class="profile-img" src="fix_images/mohammed.png" alt="..."
                                style="filter: drop-shadow(0 0 100px #121212)" />

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- About Section-->
    <section class="bg-light py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                        <div>
                            <p class="lead fw-light mb-4">My name is {!! $profile->name ?? '<span> Nothing </span>' !!} laravel developer.</p>
                            <div class="aaep">
                                <p><span>Age:</span> {!! isset($profile->birth_day)
                                    ? \Carbon\Carbon::parse($profile->birth_day)->age .'years old'
                                    : '<span class="fw-bold text-danger"> Nothing </span>' !!} </p>
                                <p><span>Address:</span> {!! isset($profile->city) && isset($profile->country)
                                    ? $profile->city . ', ' . $profile->country
                                    : '<span class="fw-bold text-danger"> Nothing </span>' !!}</p>
                                <p><span>Email:</span> {!! $profile->email ?? '<span class="fw-bold text-danger"> Nothing </span>' !!}</p>
                                <p><span>Phone:</span> {!! $profile->phone_number ?? '<span class="fw-bold text-danger"> Nothing </span>' !!} </p>
                            </div>
                        </div>

                        <div>
                            @if ($profile && $profile->social)
                                <p class="text-muted">{{ $profile->social->bio }}</p>
                            @else
                                <p class="fw-bold text-danger">NO Bio</p>
                            @endif
                        </div>

                        <div class="d-flex justify-content-center fs-2 gap-4">
                            {{-- target="_blank" this attribute is for open the link in the new tab --}}
                            @if ($profile && $profile->social)
                                <a class="text-gradient" href="{{ url($profile->social->twitter) }}" target="_blank"><i
                                        class="bi bi-twitter"></i></a>
                            @else
                                <span class="fw-bold text-danger"> Nothing </span>
                            @endif

                            @if ($profile && $profile->social && $profile->social->github)
                                <a class="text-gradient" href="{{ url($profile->social->linkedin) }}" target="_blank"><i
                                        class="bi bi-linkedin"></i></a>
                            @else
                                <span class="fw-bold text-danger"> Nothing </span>
                            @endif

                            @if ($profile && $profile->social && $profile->social->twitter)
                                <a class="text-gradient" href="{{ url($profile->social->github) }}" target="_blank"><i
                                        class="bi bi-github"></i></a>
                            @else
                                <span class="fw-bold text-danger"> Nothing </span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
