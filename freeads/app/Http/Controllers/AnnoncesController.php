<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Annonce;

use App\User;

use App\Photographie;

use Auth;

class AnnoncesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $annonces=Annonce::latest()->paginate(5);

    return view('annonces.index', compact('annonces'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('annonces.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $data=[];
    $user_id = Auth::user()->id;
    $annonce = Annonce::create([
      'user_id' => $user_id,
      'titre' => $request->titre,
      'description' => $request->description,
      'prix'=> $request->prix,
      'catégorie'=> $request->catégorie,
      'couleur' => $request->couleur,
      'taille' => $request->taille,
      'tags' => $request->tags,
      'ville' =>$request->ville,
      ]);

      if($request->hasFile('photographie')){
        foreach ($request->file('photographie') as $photo) {
          $photo->store('public');
          $name=$photo->hashName();

          $photo->move(public_path().'/files/', $name);
          array_push($data, $name);
        }

        for ($i = 0; $i < count($data); $i++){

          $photographie =  Photographie::create([
            'user_id' => $user_id,
            'annonce_id' => $annonce->id,
            'photographie'=> $data[$i],
          ]);
        }
      }
      return redirect('/annonces');
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Annonce $annonce)
    {
      return view('annonces.show', compact('annonce'));
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Annonce $annonce)
    {
      // show the edit form and pass the billet
      if(auth()->user()->id !==$annonce->user_id)
      {
        return redirect('/annonces')->with('error', 'Unauthorized Page');
      }
      return view('annonces.edit')->with('annonce', $annonce);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Annonce $annonce)
    {
      if(auth()->user()->id !==$annonce->user_id)
      {
        return redirect('/annonces')->with('error', 'Unauthorized Page');
      }
      //$request->file('photographie')->store('public');
      // ensure every image has a different name
      //$file_name = $request->file('photographie')->hashName();

      // save new image $file_name to database
      //  $annonce->update(['photographie' => $file_name]);
      $user_id = Auth::user()->id;
      $data=[];

      $annonce->titre =  $request->titre;
      $annonce->description = $request->description;
      $annonce->prix = $request->prix;
      $annonce->couleur =  $request->couleur;
      $annonce->taille = $request->taille;
      $annonce->tags = $request->tags;
      $annonce->ville = $request->ville;

      $annonce->save();

      if($request->hasFile('photographie')){
        foreach ($request->file('photographie') as $photo) {
          $photo->store('public');
          $name=$photo->hashName();

          $photo->move(public_path().'/files/', $name);
          array_push($data, $name);
        }

        for ($i = 0; $i < count($data); $i++){

          $photographie =  Photographie::create([
            'user_id' => $user_id,
            'annonce_id' => $annonce->id,
            'photographie'=> $data[$i],
          ]);
        }
      }

      return redirect('/annonces')->with('success', 'Post Updated');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Annonce $annonce)
    {
      if(auth()->user()->id !==$annonce->user_id)
      {
        return redirect('/annonces')->with('error', 'Unauthorized Page');
      }
      $annonce->delete();
      return redirect('/annonces')->with('success', 'Post Deleted');
    }

    public function search()
    {

    }
  }
