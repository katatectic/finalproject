<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model {

    protected $table = 'checks';
    protected $fillable = ['report_id', 'image'];

    public function report() {
        return $this->belongsTo('App\Report');
    }

}
