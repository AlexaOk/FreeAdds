@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            
            Welcome to Free Adds !

          </div>
        </div>
        <div class="card">

          <div class="card-body">
            @if(isset($message))
              <p><b> {{ $message }} </b> </p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
