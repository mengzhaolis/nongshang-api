<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','news_id'];

}