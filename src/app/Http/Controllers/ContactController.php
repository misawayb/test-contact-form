<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('contact.index',compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->only('category_id', 'first_name', 'last_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3','address', 'building', 'detail');
        $contact['tel'] = $contact['tel_1'] . $contact['tel_2'] . $contact['tel_3'];
        unset($contact['tel_1'], $contact['tel_2'], $contact['tel_3']);
        session(['contact' => $contact]);

        return redirect()->route('contact.showConfirm');
    }

    public function showConfirm(Request $request){
        $contact = session('contact');
        $genders = [
            Contact::GENDER_MALE =>'男性',
            Contact::GENDER_FEMALE => '女性',
            Contact::GENDER_OTHER => 'その他',
        ];
        $category = Category::find($contact['category_id']);

        return view('contact.confirm',compact('contact','genders','category'));
    }

    public function store(){
        $contact = session('contact');
        Contact::create($contact);
        session()->forget('contact');

        return redirect()->route('contact.thanks');
    }

    public function thanks(){
        return view('contact.thanks');
    }

    public function back(){
        $contact = session('contact');
        return view('contact.index',compact('contact'));
    }
}
