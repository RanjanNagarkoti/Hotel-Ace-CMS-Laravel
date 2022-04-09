<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index(){
        return view('user.contact');
    }

    public function store(Request $request){
        $data = $request->all();
        $this->contact->create($data);
        return redirect('/hotel-ace/contact')->with('success', 'Thank you for your message!');
    }

    public function show(){
        $data = $this->contact->paginate(5);
        return view('admin.comment', compact('data'));
    }

    public function destroy(Request $request, $id)
    {
        $data = $request->all();
        $this->contact->where('id', "$id")->delete($data);
        return redirect('/hotel-ace/admin/comment')->with('success', 'Comment deleted successfully!');
    }
}
