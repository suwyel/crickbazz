<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveMatc extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_first_name',
        'team_second_name',

    ];
}