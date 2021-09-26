<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $speciliasts = User::where('is_specialist', 1)->get();
        return view('chat.index', [
            'specialists' => $speciliasts,
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

    public function show_chat($specialist)
    { 
        $user = Auth::user();
        $specialist = User::findOrFail($specialist);
        $user_id = $user->id;
        $msgs = Message::all();
        return view('chat.show', [
            'specialist' => $specialist,
            'user' => $user,
            'msgs' => $msgs
        ]);
    }
}
