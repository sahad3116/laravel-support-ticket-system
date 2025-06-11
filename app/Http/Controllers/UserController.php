<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class UserController extends Controller
{
 public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); 
            return redirect()->route('ticket.list')->with('success', 'Login successful!');

        } else {
            return back()->with('error', 'Invalid email or password. Please try again.');
        }
    }
public function ticketlists()
{
    try {
        $technicalTickets = Ticket::on('technical')->get();
        $billingTickets   = Ticket::on('billing')->get();
        $productTickets   = Ticket::on('product')->get();
        $generalTickets   = Ticket::on('general')->get();
        $feedbackTickets  = Ticket::on('feedback')->get();
    } catch (\Exception $e) {
        dd("DB error: " . $e->getMessage());
    }
    $technicalTickets->each(fn($t) => $t->source = 'technical');
    $billingTickets->each(fn($t) => $t->source = 'billing');
    $productTickets->each(fn($t) => $t->source = 'product');
    $generalTickets->each(fn($t) => $t->source = 'general');
    $feedbackTickets->each(fn($t) => $t->source = 'feedback');
    $allTickets = collect()
        ->merge($technicalTickets)
        ->merge($billingTickets)
        ->merge($productTickets)
        ->merge($generalTickets)
        ->merge($feedbackTickets);
    logger([
        'technical' => $technicalTickets->count(),
        'billing'   => $billingTickets->count(),
        'product'   => $productTickets->count(),
        'general'   => $generalTickets->count(),
        'feedback'  => $feedbackTickets->count(),
    ]);

    return view('ticket_list', ['tickets' => $allTickets]);
}

public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/')->with('success', 'You have been logged out!'); 
      
    }

}
