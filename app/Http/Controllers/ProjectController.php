<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show', 'archive']);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'projects.index',
            ['projects' => Project::with(['skills', 'image'])->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'projects.create',
            [
                'skills' => Skill::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->only(['title', 'url', 'description']);
        $project = Project::create($data);

        // Get the selected skills from the form
        // $skillIds = $request->input('skills', []);

        // Attach the skills to the project in the pivot table
        $project->skills()->attach($request->skills);

        // $project->skills()->attach($skillIds);


        //upload picture for current post
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('project_images');
            //Storage::putFile('name of the folder', $file) this other way by  using facade Storage 
            $image = new Image(['path' => $path]);
            $project->image()->save($image);
        }

        return redirect()->route("projects.index")->with("success", " the project has added!");
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
        $project = Project::findOrFail($id);

        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $skill = Skill::findOrFail($id);
        //  $skill->delete();

        // destroy doesn't need to select data like delete()
        // $this->authorize('delete', $post);
        // Detach the related skills (or other related models) to remove records from the pivot table

        //      $project = Project::find($id);

        // $project->skills()->detach();
        // $project->delete();
        Project::destroy($id);


        // Delete the file from folder storage
        //  Storage::delete($project->path);
        //  $project->forceDelete();

        Session::flash('danger', 'the project was deleted!');

        return redirect()->back();
    }
}
