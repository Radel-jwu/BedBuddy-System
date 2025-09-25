<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
   public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message'     => 'required|string',
        ]);

        $message = Message::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message'     => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
    public function conversation($id)
{
    $userId = Auth::id();

    // ✅ Get all messages between logged-in user and the other user
    $messages = Message::where(function ($q) use ($userId, $id) {
            $q->where('sender_id', $userId)->where('receiver_id', $id);
        })
        ->orWhere(function ($q) use ($userId, $id) {
            $q->where('sender_id', $id)->where('receiver_id', $userId);
        })
        ->with('sender:id,firstname,lastname,profile_pic') // sender info
        ->orderBy('created_at', 'asc')
        ->get();

    // ✅ Transform into a consistent JSON
    $messages = $messages->map(function ($m) {
        return [
            'id' => $m->id,
            'user_id' => $m->sender_id,
            'message' => $m->message,
            'created_at' => $m->created_at->toDateTimeString(),
            'user' => [
                'id' => $m->sender->id,
                'firstname' => $m->sender->firstname ?? '',
                'lastname' => $m->sender->lastname ?? '',
                'profile_pic' => $m->sender->profile_pic ?? null,
            ]
        ];
    });

    return response()->json($messages);
}
}
