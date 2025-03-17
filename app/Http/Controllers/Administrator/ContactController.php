<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        $contact = About::find(4);
        return view('admin.contact.index', compact('contact'));
    }
    function show()
    {
        return view('admin.contact.add');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image'); 
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/');

            $file->move($destinationPath, $filename);
            $data['colum1'] = $filename;
        }
        // dd($validatedData);

        $blog = About::find($request->contact_id);
        if ($blog) {
            $blog->update($data);
            $msg = "Contact Updated";
        } else {
            $msg = "Contact Not Found";
        }
       

        return response()->json([
            'success' => $msg,
            'redirect' => route('contact.index')
        ]);
    }
    function edit($id) {
        $contact = About::find($id);
        return view('admin.contact.add',compact('contact'));
    }
    function show_contacts() {
        $contacts = Contact::get();
        return view('admin.contact.view_contacts',compact('contacts'));
    }
}
