<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function index()
    {
        $contact = Contact::all();
        return view('frontend.contact.index',compact('contact'));
    }

     public function store(Request $request)
    {
        $data = new Contact();
        $data ->name = $request->input('name');
        $data ->email = $request->input('email');
        $data ->phone = $request->input('phone');
        $data ->message = $request->input('message');
        $data->save();
        Mail::to('rabbinsubedi@gmail.com')->send (new ContactMail($data));
        return redirect()->back()->with('status', 'Done');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('status', 'Deleted');
    }
}
