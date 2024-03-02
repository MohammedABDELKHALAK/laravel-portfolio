<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\SocialRequest;
use App\Models\Image;
use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'avatars' => User::with(['image', 'social'])->get(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        Session::flash('status', 'Your profile information was updated successfuly!');
        // $request->session()->flash('status', 'Task was updated succefuly!');

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function profileImage(AvatarRequest $request, $id)
    {

        $user = User::findOrFail($id);

        //upload picture for current post
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('profiles_images');
            //Storage::putFile('name of the folder', $file) this other way by  using facade Storage 

            if ($user->image) {
                //to delete old one

                Storage::delete($user->image->path);
                $user->image->path = $path;
                $user->image->save();

                return redirect()->back()->with('updateImageProfileStatus',  'Profile picture was updated!');
            } else {
                // i am using make instead of create 
                //because in morph relationship it will create a champ for imageable_type i had to use make to fill the champ automatically
                $user->image()->save(Image::make(['path' => $path]));
            }
            return redirect()->back()->with('createimageProfileStatus',  'Profile picture was created!');
        }
    }


    public function forceDelete($id)
    {

        $user = User::with(['image'])->findOrFail($id);
        $image = $user->image;
        if ($image) {
            // Delete the file from folder storage
            Storage::delete($image->path);
            $image->forceDelete();
        } else {
            Session::flash('errorImage', 'There is no image for this user to delete ');
        }

        return redirect()->back();
    }

    public function socialform(SocialRequest $request, $id)
    {

        //************** easy way to upadate and create in same time short code and easy to remember it*********************** */

        // $user = User::findOrFail($id);

        // // Assuming authorization logic is handled before this point
    
        // $data = $request->validated(); // This ensures you're working with validated data
    
        // if ($user->social) {
        //     // Update existing social profile
        //     $user->social->update($data);
        // } else {
        //     // Create a new social profile for the user
        //     $user->social()->create($data);
        // }

        //************************************************* */


        $user = User::findOrFail($id);
        $data = $request->validated(); // This ensures you're working with validated data
        // $data = $request->all();
        $data['user_id'] = $user->id;

        // dd($data);
  
        if ($data) {

            if ($user->social) {
         
                // this is other way to Update existing social profile
                // $user->social->update([
                //     'linkedin' => $data['linkedin'],
                //     'github' => $data['github'],
                //     'twitter' => $data['twitter'],
                //     'bio' => $data['bio'],
                // ]);

                $user->social->linkedin = $data['linkedin'];
                $user->social->github = $data['github'];
                $user->social->twitter = $data['twitter'];
                $user->social->bio = $data['bio'];

                // isDirty() is laravel eluequet can use to check if the input is vide
                if ($user->social->isDirty()) {
                    $user->social->save();
                    return redirect()->back()->with('updatedSocialStatus', 'Social profile updated successfully!')->withFragment('SocialForm');
                } else {
                    return redirect()->back()->with('NoChangesSocialStatus', 'No changes were made to the social profile.')->withFragment('SocialForm');
                }

                // return redirect()->back()->with('updatedSocialStatus',  'Social Profile was updated!')->withFragment('SocialForm');
            } else {
                // this is if the profile user doesn't have an sociol
                $user->social()->create($data);
                return redirect()->back()->with('createSocialStatus',  'Social Profile was created!')->withFragment('SocialForm');
            }
        }
    }
}
