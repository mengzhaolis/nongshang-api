<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type_name'];
}