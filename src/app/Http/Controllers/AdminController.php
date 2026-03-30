<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(7);
        $genders = Contact::GENDERS;
        $categories = Category::all();

        return view('admin.index', compact('contacts','genders','categories'));
    }

    public function search(Request $request){
        $contacts = Contact::query()
            ->when($request->text, fn($q) => $q->searchText($request->text))
            ->when($request->gender, fn($q) => $q->where('gender', $request->gender))
            ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
            ->when($request->date, fn($q) => $q->whereDate('created_at', $request->date))
            ->paginate(7);
        $genders = Contact::GENDERS;
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'genders', 'categories'));
    }

    public function reset() {
        return redirect()->route('admin.index');
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('admin.index');
    }

    public function export() {
        $contacts = Contact::all();
        $csvHeader = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', 'お問い合わせ内容'];
        $csvData = $contacts->map(function ($contact) {
            $genders = Contact::GENDERS;
                return [
                    $contact->last_name . '　' . $contact->first_name,
                    $genders[$contact->gender],
                    $contact->email,
                    $contact->category->content,
                    $contact->detail,
                ];
        });
        $response = response()->streamDownload(function () use ($csvHeader, $csvData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);
            foreach ($csvData as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        }, 'contacts.csv');

        return $response;
    }
}