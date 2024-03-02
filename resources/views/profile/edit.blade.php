@extends('layouts.app')

@section('content')


   <x-alert> </x-alert>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 my-4">

                 <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.avatar-user-form')
                    </div> 
                </div> 

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.social-media')
                    </div> 
                </div> 

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>



                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
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
