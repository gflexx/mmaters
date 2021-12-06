<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gathuku\Mpesa\Mpesa;
use Psy\Util\Json;

class PaymentController extends Controller
{
    public function index(){
        return view('payment.index');
    }

    public function wait_payment(){
        $redirectUrl = route('show_chats');
        return view('payment.wait', [
            'redirectUrl' => $redirectUrl,
        ]);
    }

    public function save_payment(Request $request){
        $this->validate($request, [
            'phonenumber' => 'required'
        ]);

        $phoneNum = $request->phonenumber;
        $amount = 1;

        // perform mpesa express payment
        $mpesa = new Mpesa();
        $expressResponse = $mpesa->express($amount, $phoneNum);

        auth()->user()->payments()->create([
            'phonenumber' => $phoneNum,
            'total' => 1000.00,
        ]);

        return redirect()->route('wait_payment');

    }

    public function confirmation(Request $request){
        $data = $request->getContent();
        return response($data);
    }

    public function validation(Request $request){
        $data = $request->getContent();
        return response($data);
    }
}
