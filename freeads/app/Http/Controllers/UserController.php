<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

use Session;

use Database;

class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users=User::latest()->paginate(5);

    return view('users.index', compact('users'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
        return view('users.show', compact('user'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {
    // show the edit form and pass the billet
    return view('auth.edit')->with('user', $user);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    //   DB::table('users')
    //        ->where('id', $user->id)
    //        ->update($request);
    User::where('id', $user->id)->update(array('name' => $request->name, 'email' => $request->email));
    // $user->name =  $request->name;
    // $user->password = $request->password;
    // $user->email = $request->email;
    // $user->save();
    Session::flash('status', 'Profile updated');
    return redirect('/home');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    $user->delete();
    Session::flash('status', 'Profile deleted');
    return redirect('/');
  }
}
