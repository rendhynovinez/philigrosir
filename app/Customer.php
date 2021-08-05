<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer  extends Authenticatable
{
    //
      //
      protected $fillable = [
        'username',
        'email',
        'password',
        'refferal_code',
        'permission',
        'is_active',
        'refferal_code',
        'sales_id',
        'store_name'
  ];
  protected $hidden = [
       'password', 'remember_token'
  ];
  
  public function setPasswordAttribute($val)
  {
       return $this->attributes['password'] = bcrypt($val);
  }
  
}
