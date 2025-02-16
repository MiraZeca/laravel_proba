<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function send(Request $request)
    {
        // Validacija podataka
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Sačuvaj podatke u bazi
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Podaci koji će biti poslati u email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Logovanje podataka koji se šalju
        Log::info('Attempting to send email with data:', $data);

        // Slanje email-a sa Mail::send() i šablonom

        try {
            Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
                $message->to('mira.tmf@gmail.com')
                    ->subject($data['subject']);
            });

            Log::info('Email sent successfully.');
            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }

    public function info()
    {
        $contacts = Contact::all(); // Dohvatanje svih kontakata iz baze
        return view('contact.info', compact('contacts'));
    }

    public function markAsAnswered(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->answered = $request->answered;
        $contact->save();

        return response()->json(['success' => true, 'answered' => $contact->answered]);
    }
}
