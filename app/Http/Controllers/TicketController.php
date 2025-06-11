<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class TicketController extends Controller
{
     public function store(Request $request)
    {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
                'type' => 'required|in:technical,billing,product,general,feedback',
            ]);

        $connection = $validated['type']; 

        $ticket = new Ticket($validated);
        $ticket->setConnection($connection);
        $ticket->save();

        return redirect()->back()->with('success', 'Ticket submitted successfully.');
    }

    public function Login(){
        return view('login');
    }

    public function Tickets(){
      return view('tickets');

    }
    public function registerpage(){
          return view('registerpage');

    }

     public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('register')->with('success', 'Registration successful!');
    }

    public function viewTicket($id, $source)
{
     try {
            $ticket = Ticket::on($source)->findOrFail($id);
            $ticket->source = $source;
            return view('view_list', compact('ticket'))->with('success', 'Ticket has been marked as noted.');
        } catch (\Exception $e) {
            Log::error("Error in viewTicket: " . $e->getMessage(), [
                'ticket_id' => $id,
                'source' => $source,
            ]);
            return redirect()->route('ticket.list')->with('error', 'Could not view or update ticket: ' . $e->getMessage());
        }
    }

    public function deleteTicket($id, $source)
    {
        $ticket = Ticket::on($source)->findOrFail($id);
        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket deleted successfully.');
    }
    public function ticketstatus($id, $source)
    {
        $ticket = Ticket::on($source)->findOrFail($id);
        $ticket->status = 'noted';
        $ticket->save();

        return redirect()->route('ticket.list')->with('success', 'Ticket has been marked as noted.');
    }

    public function updateNote(Request $request, $id, $source)
    {
        $request->validate([
            'note' => 'nullable|string',
        ]);

        $ticket = Ticket::on($source)->findOrFail($id);
        $ticket->note = $request->input('note');
        $ticket->save();

        return redirect()->route('ticket.list')->with('success', 'Admin note updated successfully.');
    }

}



