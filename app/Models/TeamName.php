<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamName extends Model
{
    use HasFactory;
    protected $fillable = [

        'tem_id',
        'team_first_name',
        'team_second_name',

    ];
}