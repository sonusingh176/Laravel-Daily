<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(){
        $contact =Contact::with('user')->get();
        return $contact;
    }
}
