<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('payment.index');
    }

    public function save_payment(Request $request){
        $this->validate($request, [
            'phonenumber' => 'required'
        ]);

        $phoneNum = $request->phonenumber;

        auth()->user()->payments()->create([
            'phonenumber' => $phoneNum,
            'total' => 1000.00,
        ]);

        return redirect('chats');
    }
}
