<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    public $fillable = ['report_date', 'name_charge', 'date', 'value'];
    
}
