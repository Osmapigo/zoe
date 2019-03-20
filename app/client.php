<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'zip_code', 'longitude', 'latitude'
    ];
}
