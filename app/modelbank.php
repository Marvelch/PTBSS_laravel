<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelbank extends Model
{
    public $table = 'bank';

    public $fillable = ['bank_name','contact_email','logo'];
}
