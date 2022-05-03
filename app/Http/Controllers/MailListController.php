<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class MailListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function make_email(){
        return view('email.create_email');
    }

    public function save_email(Request $request){
        $data = $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);
        Email::create($data);
        return redirect()->route('admin');
    }
}
