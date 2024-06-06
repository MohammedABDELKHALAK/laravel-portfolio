<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\ContactJob;
use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function home()
    {
        // Fetch the first user in the database 
        // this method for data to be appeare to visitors without bieng authautify

        // ********this first way but i using AppServiceProvider*********// 
        // ******to make variable availabe to other view blades *********//

        // $user = User::with(['social'])->select('id', 'name', 'email')
        //     ->first();

        // return view('resume.home', [
        //     'profile' => $user,
        // ]);

        //************************************************************//
        //************************************************************//

        return view('resume.home');
    }

    public function resume()
    {
        return view('resume.resume');
    }

    public function project()
    {
        return view('resume.project',
        ['projects' => Project::with(['skills', 'image'])->get()]
    );
    }

    public function dowloandPDF()
    {
        $filePath = public_path('files/cv.pdf');
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'MyCV.pdf';

        if (file_exists($filePath)) {
            return response()->download($filePath, $fileName, $headers);
        } else {
            abort(404);
        }
    }


    public function indexContact()
    {
        return view('resume.contact');
    }


    public function sendEmail(ContactRequest $request)
    {
        // $data = $request->only(['name', 'email', 'message']);

        $data = $request->all();


        Message::create($data);

        $job = new ContactJob($data);
        // Dispatch the job to the queue with a delay of 1 minute
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
