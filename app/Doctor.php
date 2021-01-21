<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
     protected $primaryKey = "id";

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name','email','phone','password','photo','category','qualification', 'current_workplace', 'current_workplace_designation','specialized','status','last_login'
    ];
}
