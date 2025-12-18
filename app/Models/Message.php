<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'user_id', 'name', 'email', 'phone', 'message', 'read_at'];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function user() // Sender
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
