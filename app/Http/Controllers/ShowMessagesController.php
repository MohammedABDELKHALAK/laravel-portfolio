<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMessagesController extends Controller

{

    public function index()
    {

        $hasTrashedMessages = Message::onlyTrashed()->exists();

        return view(
            'dashboard',
            [
                // 'messages' =>  Message::all(),
                //this show next and prev button
                // 'messages' =>  Message::simplePaginate(10),
                // and this use numbers buttons

                'messages' =>  Message::dernier()->paginate(10),
                'hasTrashedMessages' =>  $hasTrashedMessages 
            ]
        );
    }

    public function show($id)
    {
        return view(
            'messages.show',
            [
                'message' =>  Message::findOrFail($id),
                // 'skills' =>  Skill::all()

            ]
        );
    }

    public function updatePagination(Request $request)
    {
        // Get the selected number of items per page from the form submission
        $selectNumberPerPage = (int) $request->input('perPage');

        // Retrieve messages with the updated pagination settings
        return view('dashboard', ['messages' =>  Message::dernier()->paginate($selectNumberPerPage)]);
    }



    public function deleteAll()
    {
        // this doen't respect softDelete
        // Message::truncate();

        Message::query()->delete();

        return redirect()->back();
    }


    public function restoreAll()
    {
// Restore all trashed messages in one query
        // Message::onlyTrashed()->restore();

  // Count the trashed messages
  $trashedCount = Message::onlyTrashed()->count();
  if ($trashedCount > 0) {
    // Restore all trashed messages in one query
    Message::onlyTrashed()->restore();

    // Add success alert
    return redirect()->back()->with('status', 'success')->with('message', 'All trashed messages have been restored.');
} else {
    // Add warning alert
    return redirect()->back()->with('status', 'warning')->with('message', 'There are no trashed messages to restore.');
}
       
    }


    
}
