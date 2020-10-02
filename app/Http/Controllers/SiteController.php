<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Post;
use App\TestSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function contactUs()
    {
        return view('contact');
    }

    public function contactUsForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'required|max:191',
            'message' => 'required|max:500',
        ]);

        Inquiry::create($data);

        Mail::raw($data['message'], function ($message) use ($data) {
            $message->from('contact@gatearch.in', 'Contact Us Form');
            $message->sender($data['email'], $data['name']);
            $message->to('contact@gatearch.in', 'GateArch');
            $message->subject("Inquiry {$data['name']}: {$data['subject']}");
        });

        return view('contact', [
            'success' =>
            'Thank you for contacting us! We will reach out to you as soon as possible!'
        ]);
    }

    public function testSeries()
    {
        return view('testseries', ['serieses' => TestSeries::latest()->paginate(5)]);
    }

    public function blog()
    {
        return view('blog', ['posts' => Post::latest()->paginate(10)]);
    }

    public function posts(Post $post, $title)
    {
        abort_if($post->slug !== $title, 404);
        return view('post', compact('post'));
    }
}
