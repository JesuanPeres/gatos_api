<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    public $fillable = [
        'imperial',
        'metric',
        'breed_id'
    ];

    protected $hidden = [
        'id',
        'breed_id'
    ];
    
    public $timestamps = false;
}
