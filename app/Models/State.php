<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'id_country'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'id_country');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'id_state');
    }
}
