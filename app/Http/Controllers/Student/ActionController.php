<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Admin\Crud\InquiryController;
use App\Http\Controllers\Controller;
use App\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActionController extends Controller
{
    public function contactUs(Request $request)
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
            'Thank you for contcating us! We will reach out to you as soon as possible!'
        ]);
    }
}
