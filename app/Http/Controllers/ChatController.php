<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chat;
use App\ChatMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;

class ChatController extends Controller{

    public function sendMessage(Request $request)
    {
        $username = $request->username;
        $text = $request->text;

        $chatMessage = new ChatMessage();
        $chatMessage->sender_username = $username;
        $chatMessage->message = $text;
        $chatMessage->save();
    }

    public function isTyping(Request $request)
    {
        $username = $request->username;

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = true;
        else
            $chat->user2_is_typing = true;
        $chat->save();
    }

    public function notTyping(Request $request)
    {
        $username = $request->username;

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = false;
        else
            $chat->user2_is_typing = false;
        $chat->save();
    }

    public function retrieveChatMessages(Request $request)
    {
        $username = $request->username;

        $message = ChatMessage::where('sender_username', '!=', "%$username%")->where('read', 'LIKE', 0)->first();

        if (count($message) > 0)
        {
            $message->read = true;
            $message->save();
            return $message->message;
        }
    }

    public function retrieveTypingStatus(Request $request)
    {
        $username = $request->username;

        $chat = Chat::find(1);
        dd($chat);

        if ($chat->user1 == $username)
        {
            if ($chat->user2_is_typing)
                return $chat->user2;
        }
        else
        {
            if ($chat->user1_is_typing)
                return $chat->user1;
        }
    }
}