<?php

namespace App\Http\Controllers\Conversations;

use App\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConversationController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('conversations.index');
    }

    /**
     * Undocumented function
     *
     * @param Conversation $conversation
     * @param Request $request
     * @return void
     */
    public function show(Conversation $conversation, Request $request)
    {
        $this->authorize('show', $conversation);

        $request->user()->conversations()->updateExistingPivot($conversation, [
            'read_at' => now()
        ]);
        
        return view('conversations.show', compact('conversation'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        return view('conversations.create');
    }
}
