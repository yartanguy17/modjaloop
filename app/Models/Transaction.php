<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated',
    ];

    public function senderAccount()
    {
        return $this->belongsTo('App\Models\Account', 'account_sender_id');
    }

    public function receiverAccount()
    {
        return $this->belongsTo('App\Models\Account', 'account_receiver_id');
    }
}
