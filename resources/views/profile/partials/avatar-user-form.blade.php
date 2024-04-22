<section>

    <div class="card ">

        <div class="img">

            {{-- this div fo avatar's image, if avatar has image will appear otherwise will show default image --}}
            @foreach ($avatars as $avatar)
                @if (auth()->check() && Auth::user()->id == $avatar->id)
                    <img src="{{ $avatar->image ? Storage::url($avatar->image->path) : asset('fix_images/avatar.png') }}"
                        alt="User Avatar">
                @endif
            @endforeach

            <form method="POST" action=" {{ route('profile.force.delete', ['id' => Auth::id()]) }}">
                @csrf
                @method('DELETE')
                <div class="trash-icon">

                    <button id="add" type="submit" class="btn" aria-label="Delete">
                        <i class="bi bi-trash"></i>
                    </button>

                </div>
            </form>
        </div>

        <div class="btn-img">

            <form method="POST" action="{{ route('profile.image', ['id' => Auth::id()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group"><label for="picture">
                        <h5 class="card-title">Picture:</h5>
                    </label><br>
                    <input type="file" name="picture" id="picture" class="form-control-file my-2">
                </div>

                @error('picture')
                    <div class="text-danger">
                        {{-- $message is pre-define when you use it between derictive error --}}
                        <p> {{ $message }}</p>
                    </div>
                @enderror

                <button class="btn btn-primary" type="submit">Add Picture</button>
            </form>
        </div>
    </div>

</section>
