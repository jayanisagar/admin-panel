<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'date', 'time', 'company_id'];
}
