@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="col-sm-10 blog-main">
          <div class="card">
            <div class="card-header">
              <h1>{{$annonce->titre}}
              </h1>
              <p class="blog-post-meta">
                <a href="#">{{"@".$annonce->user->name}}</a>
              </p>
            </div>
            <div class="card-body">
              <h3>{{ $annonce->description }}</h3>
              <br>
              <h4>{{ $annonce->prix }} €</h4>
              <br>
              @foreach ($annonce->photographies as $photo)
                  <img width="32%" src="{{ asset('storage/' . $photo->photographie) }}">
              @endforeach

            </div>

            @if(!Auth::guest())
              @if(Auth::user()->id == $annonce->user_id)
                <a class="btn btn-basic " href="{{ route('annonces.edit', $annonce->id)}}">Edit</a>
              @endif
            @endif

            @if(!Auth::guest())
              @if(Auth::user()->id == $annonce->user_id)
                <form action="{{ route('annonces.delete',$annonce->id)}}" method="POST" >
                  {{ method_field('PUT') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-link col-sm-12">
                    {{ __('Delete') }}
                  </button>
                </form>
              @endif
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
