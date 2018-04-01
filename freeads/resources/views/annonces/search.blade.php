@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-sm-12 blog-main">
          <div class="card justify-content-center">
            <div class="card-header"><h1>Search Results</h1></div>
            <div class="card-body">
                @if(isset($details))
                  {{-- <p><b> {{ $query }} </b> </p> --}}
                  <h2>Items</h2>
                  <table class="table table-striped">
                    <tbody>
                      @foreach($details as $annonce)
                        <tr>
                          <td><h4><a href="/annonces/{{ $annonce->id}}">
                            {{$annonce->titre}}
                          </a></h4></td>
                          <td>{{$annonce->description}}</td>
                          <td>
                             @foreach ($annonce->photographies as $photo)
                              <img   height="150px" src="{{ asset('storage/' . $photo->photographie) }}"/>
                            @endforeach
                          </td>
                          <td>
                            {{ ucfirst($annonce->couleur) }}
                            <br>
                            Size : {{ $annonce->taille}}
                            <br>
                            {{ $annonce->prix}} €
                            <br>
                             {{ $annonce->catégorie}}
                            <br>
                            Seller : <a href="/users/{{ $annonce->user->id}}">{{ "@".$annonce->user->name}}</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
