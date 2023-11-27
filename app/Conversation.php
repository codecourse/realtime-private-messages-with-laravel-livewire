<?php

namespace App;

use App\User;
use App\Message;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'last_message_at',
        'uuid'
    ];
    
    protected $dates = [
        'last_message_at'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('read_at')
            ->withTimestamps()
            ->oldest();
    }

    public function others()
    {
        return $this->users()->where('user_id', '!=', auth()->id());
    }

    public function messages()
    {
        return $this->hasMany(Message::class)
            ->latest();
    }
}
