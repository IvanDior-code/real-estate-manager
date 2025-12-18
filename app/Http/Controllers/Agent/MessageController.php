<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('agent_id', Auth::id())->latest()->paginate(10);
        return view('agent.messages.index', compact('messages'));
    }

    public function read($id)
    {
        $message = Message::where('agent_id', Auth::id())->findOrFail($id);
        $message->update(['read_at' => now()]);
        return view('agent.messages.read', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::where('agent_id', Auth::id())->findOrFail($id);
        $message->delete();
        return back()->with('success', 'Message deleted successfully.');
    }
}
