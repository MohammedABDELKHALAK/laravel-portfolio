<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>

            {{-- i had removed this attrubute "autofocus" from the input to avoid focusing in it after refreshing the page --}}
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />

            {{-- @error('name')
                <div class="text-danger">
                    {{-- $message is pre-define when you use it between derictive error --}}
            {{-- <p> {{ $message }}</p> --}}
            {{-- </div>
                @enderror --}}

        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" name="phone_number" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone_number)"
                required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />

            @if ($errors->has('phone_number'))
                <div class="text-danger">
                    <p>{{ $errors->first('phone_number') }}</p>
                </div>
            @endif

        </div>

        <div>
            <x-input-label for="date" :value="__('Birth Day')" />
            <x-text-input id="date" name="birth_day" type="date" class="mt-1 block w-full" :value="old('date', $user->birth_day)"
                required autocomplete="date" />
        </div>

        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $user->country)"
                required autocomplete="country" />

            @if ($errors->has('country'))
                <div class="text-danger">
                    <p>{{ $errors->first('country') }}</p>
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)"
                required autocomplete="city" />

            @if ($errors->has('city'))
                <div class="text-danger">
                    <p>{{ $errors->first('city') }}</p>
                </div>
            @endif
        </div>




        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save The Update') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>


</section>
