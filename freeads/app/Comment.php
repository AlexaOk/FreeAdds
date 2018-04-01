<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    protected $fillable = ['comment', 'user_id', 'billet_id'];
    protected $guarded=[];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function annonce()
    {
      return $this->belongsTo(Annonce::class);
    }
}
