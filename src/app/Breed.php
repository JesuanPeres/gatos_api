<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false;

    public $primaryKey = 'breed_id';

    public $fillable = [
        'id',
        'name',
        'temperament',
        'life_span',
        'alt_names',
        'wikipedia_url',
        'origin',
        'experimental',
        'hairless',
        'natural',
        'rare'    ,
        'rex',
        'suppressed_tail',
        'short_legs',
        'hypoallergenic',
        'adaptability',
        'affection_level',
        'country_code',
        'child_friendly',
        'dog_friendly',
        'energy_level',
        'grooming',
        'health_issues',
        'intelligence',
        'shedding_level',
        'social_needs',
        'stranger_friendly',
        'vocalisation',
    ];

    protected $hidden = [
        'breed_id'
    ];

    public function weight() {
        return $this->hasOne(Weight::class, 'breed_id', 'breed_id');
    }
}
