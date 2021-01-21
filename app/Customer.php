<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = "id";

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'full_name','email','phone','password','photo','address', 'city', 'zip_code','gender','dob','status','verify_status','registration_date','last_login'
    ];
}
