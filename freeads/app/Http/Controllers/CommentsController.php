<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Annonce;

use App\Comment;

use Auth;

class CommentsController extends Controller
{

  public function __construct()
{
  $this->middleware('auth', ['except' =>['index', 'show']]);
}
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(annonce $annonce)
  {
    $this->validate(request(), ['comment' => 'required|min:2']);

    $annonce->addComment(new Comment(['comment'=>request('comment'), 'user_id'=>auth()->id()]));

    return back();
  }
}
