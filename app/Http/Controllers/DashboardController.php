<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'email:rfc,dns' //RFCs are specifications that define the basic protocol for Internet electronic mail transport.
        ]);

        $link = 'http://127.0.0.1:8000/mobile-number-verification'; // Replace with your actual link
        $email = $request->input('email');

        \Mail::to($email)->send(new WelcomeEmail($link));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}