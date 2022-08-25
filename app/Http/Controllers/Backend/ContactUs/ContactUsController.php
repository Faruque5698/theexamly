<?php

namespace App\Http\Controllers\Backend\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\Backend\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactusCollection = ContactUs::latest()->get();
        return view('backend.pages.contactus.index', compact('contactusCollection'));
    }

    public function show($id)
    {
        $contactus = ContactUs::findOrFail($id);
        return response()->json(['success' => true, 'contactus' => $contactus]);
    }
}
