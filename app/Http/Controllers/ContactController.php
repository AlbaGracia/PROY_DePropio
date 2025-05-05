<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdmin;
use App\Mail\ContactUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        Mail::to('de.propio.web@gmail.com')->send(new ContactAdmin($data));

        Mail::to($data['email'])->send(new ContactUser($data));

        return redirect()->route('contact.show')->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
