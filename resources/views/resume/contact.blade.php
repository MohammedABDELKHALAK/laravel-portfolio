@extends('layouts.resume.app')

@section('content')
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">

            {{-- for showing the successful alert, 
                it work for laravel with refreshing the page --}}

            @if (session('success'))
                <div id="alertSuccess" class="alert alert-success" role="alert">
                   <p id="succes-alert">{{ session('success') }}</p> 
                </div>
            @endif

            {{-- <div id="alertSuccess" >

            </div> --}}

            <!-- Contact form-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                            class="bi bi-envelope"></i></div>
                    <h1 class="fw-bolder">Contact Us</h1>
                    <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">

                        <form id="contactForm" method="POST" action="{{ route('send') }}">
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="name"
                                    placeholder="Enter your name..." value="{{ old('name') }}" required />
                                <label for="name">Full name</label>

                            </div>
                            <!-- to show error message-->
                            @error('name')
                                <div class="text-danger">
                                    {{-- $message is pre-define when you use it between derictive error --}}
                                    <p> {{ $message }}</p>
                                </div>
                            @enderror

                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email"
                                    placeholder="name@example.com" value="{{ old('email') }}" required />
                                <label for="email">Email address</label>

                            </div>
                            <!-- to show error message-->
                            @error('email')
                                <div class="text-danger">
                                    {{-- $message is pre-define when you use it between derictive error --}}
                                    <p> {{ $message }}</p>
                                </div>
                            @enderror

                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" name="message" placeholder="Enter your message here..."
                                    style="height: 10rem" required>{{ old('message') }}</textarea>
                                <label for="message">Message</label>

                            </div>
                            <!-- to show error message-->
                            @error('message')
                                <div class="text-danger">
                                    {{-- $message is pre-define when you use it between derictive error --}}
                                    <p> {{ $message }}</p>
                                </div>
                            @enderror

                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton"
                                    type="submit">Submit</button></div>

                            {{-- there is a disabled action in the button you can controled by using js  --}}
                            {{-- <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div> --}}
                        </form>

                        {{-- <div id="alertErrors" >

                        </div> --}}

                        <!-- to show all errors messages in one div using alert,
                                        it work for laravel with refreshing the page -->

                        @if ($errors->any())
                            <div id="alertErrors" class="alert alert-danger my-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        //    to show alert in just few seconds 
        document.addEventListener("DOMContentLoaded", function() {
        // var autoCloseAlert = document.querySelector('.alert');
        var autoCloseAlert = document.getElementById('alertSuccess');

        if (autoCloseAlert) {
            setTimeout(function() {
                autoCloseAlert.classList.add('d-none');
            }, 3000); // Adjust the time as needed (3000 milliseconds = 3 seconds)
        }
    });

        //    to stop refreshing the page contact 
        
    </script>
@endsection
