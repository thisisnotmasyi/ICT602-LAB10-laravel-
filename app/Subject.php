<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = 'subject';

    protected $fillable = [
        'subject_code', 'subject_name',
    ];
}
