<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class SkillController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view(
            'skills.index', [
                'skills' =>  Skill::with(['image'])->get()
                // 'skills' =>  Skill::all()
    
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'skills.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['title']);
        $skill = Skill::create($data);

               
        //upload picture for current post
        if( $request->hasFile('picture')){
            $path = $request->file('picture')->store('skill_images');
            //Storage::putFile('name of the folder', $file) this other way by  using facade Storage 
            $image = new Image(['path' => $path]);
            $skill->image()->save($image);
        }

        return redirect()->route("skills.index")->with("success", " the skill is added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view(
            'skills.edit', [

                'skill' =>  Skill::findOrFail($id)
    
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
      $skill->title = $request->input('title');
      $skill->save();

      if( $request->hasFile('picture')){   
        $path = $request->file('picture')->store('posts_images');
        //Storage::putFile('name of the folder', $file) this other way by  using facade Storage 

        if( $skill->image){ 
            //to delete old one
            
            Storage::delete($skill->image->path);
            $skill->image->path = $path;
            $skill->image->save();

        }
        else {
         // i am using make instead of create 
         //because in morph relationship it will create a champ for imageable_type i had to use make to fill the champ automatically
            $skill->image()->save(Image::make(['path' => $path ]));
            }
     }

     return redirect()->route('skills.index')->with("warning", " the skill was updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $skill = Skill::findOrFail($id);
        //  $skill->delete();

        // destroy doesn't need to select data like delete()
        // $this->authorize('delete', $post);
        Skill::destroy($id);

        Session::flash('danger', 'the skill was deleted!');

        return redirect()->back();
    }
}
