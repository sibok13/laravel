<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderParse extends Model
{
    use HasFactory;

    protected $table = 'oreder_parse';

    protected $fillable = [
        'title', 'link', 'description'
    ];
}
