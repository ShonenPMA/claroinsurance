<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory, DatesTranslator;

    protected $fillable = ['receiver','subject','message','user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
