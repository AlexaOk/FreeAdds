<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographie extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function annonce()
    {
      return $this->belongsTo(Annonce::class);
    }
}
