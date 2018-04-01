<?php
use Illuminate\Support\Facades\Input;
use App\Annonce;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@showIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::get('/{user}/edit', 'UserController@edit')->name('auth.edit');

Route::put('/{user}/update', 'UserController@update')->name('auth.update');

Route::put('/{user}/delete', 'UserController@destroy')->name('auth.delete');

Route::get('/auth/passwords/reset', function () {
     return view('/auth/passwords/reset');
 });

Route::get('/annonces', 'AnnoncesController@index');

Route::get('/annonces/new', 'AnnoncesController@create')->name('annonces.create');

Route::put('/annonces/post', 'AnnoncesController@store')->name('annonces.store');

Route::get('/annonces/{annonce}', 'AnnoncesController@show')->name('annonces.show');

Route::get('/annonces/{annonce}/edit', 'AnnoncesController@edit')->name('annonces.edit');

Route::put('/annonces/{annonce}/update', 'AnnoncesController@update')->name('annonces.update');

Route::put('/annonces/{annonce}/delete', 'AnnoncesController@destroy')->name('annonces.delete');

Route::any('/search',function(){
    $couleur = Input::get('couleur');
    $catégorie = Input::get('catégorie');
    $tags = Input::get('tags');
    $taille = Input::get('taille');
    $ville = Input::get('ville');

    $annonce = Annonce::when($couleur,function ($query) use ($couleur) {
      return $query->where('couleur','LIKE', '%'.$couleur.'%');
    } )
      ->When($catégorie, function ($query) use ($catégorie) {
        return $query->where('catégorie','LIKE', '%'.$catégorie.'%');
      })
     ->When($taille, function ($query) use ($taille) {
       return $query->where('taille','LIKE', '%'.$taille.'%');
     })
     ->When($tags, function ($query) use ($tags) {
       return $query->where('tags', 'LIKE', '%'.$tags.'%');
     })
     ->When($ville, function ($query) use ($ville) {
       return $query->where('ville', 'LIKE', '%'.$ville.'%');
     })
     ->get();
     if(count($annonce) > 0)
        return view('/annonces/search')->withDetails($annonce)->withQuery ($couleur);
    else return view ('/home')->withMessage('No Items found. Try to search again !');
});

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/users', 'UserController@index');

Route::get('/users/{user}', 'UserController@show')->name('users.show');

Route::patch('/annonces/{annonce}/comments', 'CommentsController@store')->name('annonces.comment');
