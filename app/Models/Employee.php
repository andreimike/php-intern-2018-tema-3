<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    //table name
    protected $table = 'employee';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    protected $fillable = array('name', 'company_id', 'job');

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

}