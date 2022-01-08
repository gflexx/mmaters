<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MpesaUrlRegister;
use Gathuku\Mpesa\Mpesa;

class ChatController extends Controller
{
    public function index()
    {
        $speciliasts = User::where('is_specialist', 1)->get();
        $hasPaid = 0;

        // register mpesa confirm and validate urls
        $mpesa_registered = MpesaUrlRegister::where('has_registered', 1);

        // check if has been registered if not register
        if (! $mpesa_registered->exists()){
            $mpesa = new Mpesa();
            $registerUrlsResponse=$mpesa->c2bRegisterUrls();
            $register = MpesaUrlRegister::create([
                'has_registered' => 1
            ]);
        }

        // if user logged in check for payments
        if(Auth::check()){
            $user = auth()->user();
            $payments = Payments::where('user_id', $user->id);
            if ($payments->exists()){
                $hasPaid = 1;
            }
        }
        return view('chat.index', [
            'specialists' => $speciliasts,
            'hasPaid' => $hasPaid
        ]);
    }

    public function save_message(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        $user_id = $request->sender_id;
        $receiver_id = $request->receiver_id;
        $text = $request->text;

        Message::create([
            'sender_id' => $user_id,
            'receiver_id' => $receiver_id,
            'message' => $text
        ]);

        return redirect()->route('show_chat', ['id' => $receiver_id]);
    }

    public function show_user_chat($specialist)
    {
        $user = Auth::user();
        $specialist = User::findOrFail($specialist);
        $specialistId = $specialist->id;
        $user_id = $user->id;

        $msgs = Message::where([
            ['sender_id', $user_id],
            ['receiver_id', $specialistId],
        ])->orWhere([
            ['sender_id', $specialistId],
            ['receiver_id', $user_id]
        ])->get()->reverse();

        return view('chat.show', [
            'specialist' => $specialist,
            'user' => $user,
            'msgs' => $msgs
        ]);
    }

}
