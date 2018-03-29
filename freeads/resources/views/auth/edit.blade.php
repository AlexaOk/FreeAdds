@extends('layouts.app')

@section ('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h1>{{$user->name}}</h1>
            {{ __('Edit Your Profile') }}
            <br>
            <br>
            <form action="{{ route('auth.delete',$user->id)}}" method="POST" enctype="multipart/form-data" >
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger col-sm-3">
                {{ __('Delete Your Acocunt') }}
              </button>
            </form>
            <a class="btn btn-default" href={{url('/auth/passwords/reset')}}>Reset password</a>

          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('auth.update', $user->id)}}">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              @csrf
              <div class="form-group row">

                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{$user->name}}" required autofocus>

                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                <div class="col-md-6">
                  <input id="email" type="text-area" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required autofocus>

                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Edit') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
