<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // Admin sees all messages or maybe general inquiries? 
        // For this app, let's say Admin sees all messages for oversight.
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return back()->with('success', 'Message deleted successfully.');
    }
}
