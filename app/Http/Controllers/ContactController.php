<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\ContactJob;
use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return view('resume.contact');
    }

    public function sendEmail(ContactRequest $request)
    {
        // $data = $request->only(['name', 'email', 'message']);
        
        $data = $request->all();
        

        Message::create($data);

        $job = new ContactJob($data);
        // dispatch($job)->onQueue('default');

         // Dispatch the job to the queue with a delay of 10 seconds
         dispatch($job)->onQueue('default')->delay(now()->addMinutes(1));

        // i comnted this struture because i'm used ContactJob this other method to use queue laravel features
        // Mail::to('reciever-exemple@gmail.com')->send(new ContactMail($data));

        $request->session()->flash('success', 'message has been sent successfully!');
        

        // return redirect()->back()->with('success', 'message has been sent!');
        return redirect()->back();

        // this json to prevent refreching the page after click submit with a script js in contact.blade.php
        // return response()->json(['success' => 'Email sent successfully']);
        // return response()->json(['success' => true, 'msg' => 'Email sent successfully']);
        
    }
}
