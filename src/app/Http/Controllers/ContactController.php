<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('contact.index',compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only('category_id', 'first_name', 'last_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3','address', 'building', 'detail');
        session(['contact' => $contact]);

        return redirect()->route('contact.showConfirm');
    }

    public function showConfirm(){
        if (!session()->has('contact')) {
            return redirect()->route('contact.index');
        }
        $contact = session('contact');
        $genders = Contact::GENDERS;
        $tel = $contact['tel_1'] . $contact['tel_2'] . $contact['tel_3'];
        $category = Category::find($contact['category_id']);

        return view('contact.confirm',compact('contact','genders','category','tel'));
    }

    public function store(){
        $contact = session('contact');
        $contact['tel'] = $contact['tel_1'] . $contact['tel_2'] . $contact['tel_3'];
        unset($contact['tel_1'], $contact['tel_2'], $contact['tel_3']);
        Contact::create($contact);

        return redirect()->route('contact.thanks');
    }

    public function thanks(){
        return view('contact.thanks');
    }

    public function back(){
        $contact = session('contact');
        $categories = Category::all();
        return view('contact.index',compact('contact','categories'));
    }
}
