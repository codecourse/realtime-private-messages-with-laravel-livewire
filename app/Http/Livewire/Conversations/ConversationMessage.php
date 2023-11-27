<?php

namespace App\Http\Livewire\Conversations;

use App\Message;
use Livewire\Component;

class ConversationMessage extends Component
{
    public $message;
    
    public function mount(Message $message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.conversations.conversation-message');
    }
}
