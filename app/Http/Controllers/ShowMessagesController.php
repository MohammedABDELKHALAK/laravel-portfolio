<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMessagesController extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            [
                // 'messages' =>  Message::all(),
                //this show next and prev button
                // 'messages' =>  Message::simplePaginate(10),
                // and this use numbers buttons
                'messages' =>  Message::paginate(10),
                // 'skills' =>  Skill::all()

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
           return view('dashboard', ['messages' =>  Message::paginate( $selectNumberPerPage)]);
        
}


}
