<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Social Media & Bio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your social media & bio information.") }}
        </p>
    </header>
    
    <div class="max-w-xl">
        <!-- LinkedIn-->
        <div class="flex flex-column gap-3 bg-white/80 rounded-md py-1 px-1">

            <form id="SocialForm" method="POST" action="{{ route('profile.socialform', ['id' => Auth::user()->id]) }}">
                @csrf
                @method('PUT')

                <div class="form-floating my-3">
                    {{-- optional($avatar->social) mean if exist --}}
                    <input class="form-control" placeholder="LinkedIn" for="linkedin" name="linkedin" type="text"
                        value="{{ old('linkedin', optional($user->social)->linkedin) }}" />
                    <label id="linkedin">LinkedIn</label>

                    <!-- to show error message-->
                    @error('linkedin')
                        <div class="text-danger">
                            {{-- $message is pre-define when you use it between derictive error --}}
                            <p> {{ $message }}</p>
                        </div>
                    @enderror

                </div>


                <!-- GitHub-->
                <div class="form-floating my-3">
                    {{-- optional($avatar->social) mean if exist --}}
                    <input class="form-control" placeholder="GitHub" for="github" name="github" type="text"
                        value="{{ old('github', optional($user->social)->github) }}" />
                    <label id="github">GitHub</label>

                    <!-- to show error message-->
                    @error('github')
                        <div class="text-danger">
                            {{-- $message is pre-define when you use it between derictive error --}}
                            <p> {{ $message }}</p>
                        </div>
                    @enderror

                </div>

                <!-- Twitter-->
                <div class="form-floating my-3">
                    {{-- optional($avatar->social) mean if exist --}}
                    <input class="form-control" placeholder="Twitter" for="twitter" name="twitter" type="text"
                        value="{{ old('twitter', optional($user->social)->twitter) }}" />
                    <label id="twitter">Twitter</label>

                    <!-- to show error message-->
                    @error('twitter')
                        <div class="text-danger">
                            {{-- $message is pre-define when you use it between derictive error --}}
                            <p> {{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <!-- bio-->
                <div class="form-floating my-3">
                    {{-- optional($avatar->social) mean if exist --}}
                    <textarea class="form-control" id="message" type="text" name="bio" placeholder="Bio" style="height: 10rem"
                        required>{{ old('bio', optional($user->social)->bio) }}</textarea>
                    <label for="message">Bio</label>

                    <!-- to show error message-->
                    @error('bio')
                        <div class="text-danger">
                            {{-- $message is pre-define when you use it between derictive error --}}
                            <p> {{ $message }}</p>
                        </div>
                    @enderror

                </div>
                <!-- Submit Button-->
                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton"
                        type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>


</section>
