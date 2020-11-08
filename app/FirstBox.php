<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstBox extends Model
{
    protected $table = 'first_boxes';

    protected $fillable = ['friends_id'];
}
