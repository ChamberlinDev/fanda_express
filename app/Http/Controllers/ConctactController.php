<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConctactController extends Controller
{
    //
       public function send(Request $request)
    {
        // Validation
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Envoi de l'email
        Mail::send('contact', [
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'msg'     => $request->message,
        ], function($mail) use ($request) {
            $mail->from($request->email, $request->name);
            $mail->to('fefanda-express@gmail.com')->subject($request->subject);
        });

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
