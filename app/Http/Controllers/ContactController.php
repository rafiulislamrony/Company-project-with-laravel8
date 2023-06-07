<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }
    public function AdminAddContact()
    {
        return view('admin.contact.create');
    }
    public function StoreContact(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Contact Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.contact')->with($notification);
    }
    public function EditContact($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }//End Method

    public function UpdateContact(Request $request, $id)
    {
        Contact::find($id)->update([
             'address' => $request->address,
             'email' => $request->email,
             'phone' => $request->phone,
         ]);
         $notification = array(
            'message' => 'Contact Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.contact')->with($notification);
    }

    public function DeleteContact($id)
    {
        Contact::find($id)->delete();
        $notification = array(
          'message' => 'Contact Delete Successfully',
          'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }

    public function Contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }

    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Contact Meaasge Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('contact')->with($notification);
    }
    public function AdminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }
    public function MessageDelete($id)
    {
        ContactForm::find($id)->delete();
        $notification = array(
          'message' => 'Contact Message Delete Successfully',
          'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

}
