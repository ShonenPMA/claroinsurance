<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'id_state'];

    public function state()
    {
        return $this->belongsTo(State::class, 'id_state');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_city');
    }
}
