<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        // Lấy danh sách contact để hiển thị lại
        $contacts = Contact::latest()->get();
        return view('contact', compact('contacts'));
    }
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Lưu vào DB
        Contact::create($request->only(['name','email','phone','subject','message']));

        // Redirect kèm flash message
        return redirect()->back()->with('success','Gửi liên hệ thành công!');
    }
}
