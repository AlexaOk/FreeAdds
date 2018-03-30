<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
  use Notifiable;
  use Messagable;
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password','verifyToken', 'ville'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function annonces()
  {
    return $this->hasMany(Annonce::class);
  }
  public function photographies()
  {
    return $this->hasMany(Photographie::class);
  }
}
