<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function photographies()
  {
    return $this->hasMany(Photographie::class);
  }
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
  public function addComment(Comment $comment)
{
  return $this->comments()->save($comment);
}
}
