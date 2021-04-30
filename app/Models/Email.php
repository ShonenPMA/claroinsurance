<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory, DatesTranslator;

    protected $fillable = ['receiver','subject','message','user_id', 'state'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeReceiver($query, $receiver){
        if($receiver){
            return $query->where('receiver', $receiver);
        }
        return $query;
    }

    public function scopeSubject($query, $subject){
        if($subject){
            return $query->where('subject', $subject);
        }
        return $query;
    }

    public function scopeSender($query, $sender)
    {
        if($sender)
        {
            $user = User::where('email', $sender)->first();

            if($user)
            {
                $query->where('user_id', $user->id);

            }else{
                return [];
            }
        }
        return $query;
    }
}
