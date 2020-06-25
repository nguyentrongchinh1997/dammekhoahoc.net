<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'turn',
    ];
}
