<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //table name
    protected $table = 'company';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    protected $fillable = array('name', 'description', 'type');

    public function employee()
    {
        return $this->hasOne('App\Models\Employee');
    }
}