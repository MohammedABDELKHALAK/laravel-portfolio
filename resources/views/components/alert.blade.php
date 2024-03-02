<div>
    @if (session('status'))
        <div class="alert alert-warning" role="alert">
            {{ session('status') }}
        </div>
    @elseif(session('updateImageProfileStatus'))
        <div class="alert alert-warning" role="alert">
            {{ session('updateImageProfileStatus') }}
        </div>
    @elseif(session('createimageProfileStatus'))
        <div class="alert alert-success" role="alert">
            {{ session('createimageProfileStatus') }}
        </div>
    @elseif(session('createimageProfileStatus'))
        <div class="alert alert-success" role="alert">
            {{ session('createimageProfileStatus') }}
        </div>
    @elseif(session('errorImage'))
        <div class="alert alert-danger" role="alert">
            {{ session('errorImage') }}
        </div>
    @elseif(session('updatedSocialStatus'))
        <div class="alert alert-warning" role="alert">
            {{ session('updatedSocialStatus') }}
        </div>
    @elseif(session('NoChangesSocialStatus'))
        <div class="alert alert-info" role="alert">
            {{ session('NoChangesSocialStatus') }}
        </div>
    @elseif(session('createSocialStatus'))
        <div class="alert alert-success" role="alert">
            {{ session('createSocialStatus') }}
        </div>
    @elseif(session('LinkedInexist'))
        <div class="alert alert-info" role="alert">
            {{ session('LinkedInexist') }}
        </div>
    @elseif(session('Bioexist'))
        <div class="alert alert-info" role="alert">
            {{ session('Bioexist') }}
        </div>
    @endif


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </div>
</div>
