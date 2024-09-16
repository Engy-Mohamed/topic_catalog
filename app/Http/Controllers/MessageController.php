<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the unread and read message.
     */
    public function index()
    {
        $messages = Message::get();
        $unread_messages = $messages->where('read', '=', 0);
        $read_messages = $messages->where('read', '=', 1);
        return view('admin/messages', compact('unread_messages', 'read_messages'));
    }
    /**
     * soft delete the specified message from storage.
     */
    public function destroy(string $id)
    {
        Message::where('id', $id)->delete();
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified message and Convert an unread message into a read message.
     */
    public function show(Message $message)
    {
        if ($message['read'] == 0) {
            $message->update(['read' => 1]);
        }

        return view('admin/message_details', compact('message'));

    }
}
