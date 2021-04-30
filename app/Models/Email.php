<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory, DatesTranslator;
}
