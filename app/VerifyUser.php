<?php

namespace App;

use App\Entrepreneur;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
	protected $fillable = [
        'user_id', 'token',
    ];

    public function user()
    {
        return $this->belongsTo('App\Entrepreneur', 'user_id');
    }
}
