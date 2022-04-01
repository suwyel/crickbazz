<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoingTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'team',
        'nat',
        'won',
        'lost',
        'nr',
        'pts',
        'nrr',
    ];

}