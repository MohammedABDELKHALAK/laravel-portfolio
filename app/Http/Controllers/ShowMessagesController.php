<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ShowMessagesController extends Controller
{
    public function index()
    {
       return view(
            'dashboard', [
                'messages' =>  Message::all(),
                // 'skills' =>  Skill::all()
    
            ]
        );
    }

    public function show($id)
    {
       return view(
            'messages.show', [
                'message' =>  Message::findOrFail($id),
                // 'skills' =>  Skill::all()
    
            ]
        );
    }
}
