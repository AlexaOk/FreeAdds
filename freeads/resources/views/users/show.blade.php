@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="col-sm-10 blog-main">
          <div class="card">
            <div class="card-header">
              <h1>{{$user->name}}
              </h1>
              <h6><a class="d-flex justify-content-end" href="/messages/create">Contact</a>
            </div>
            <div class="card-body">
              <h6>{{ $user->email }}</h6>
              <br>
              <h6 class="d-flex justify-content-end">{{ $user->ville }} </h6>
              <h6 class="d-flex justify-content-end">{{$user->annonces->count()}} Annonce(s)</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
