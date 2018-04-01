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
                <a href="/users/{{ $annonce->user->id}}">{{"@".$annonce->user->name}}</a>
                <br>
                <p class="d-flex justify-content-end">{{ $annonce->catégorie}}</p>
              </p>
            </div>
            <div class="card-body">
              <h3>{{ $annonce->description }}</h3>
              <br>
              <h4 class="d-flex justify-content-end">{{ $annonce->prix }} €</h4>
              <br>
              <h4 class="d-flex justify-content-end">{{ $annonce->couleur }}</h4>
              <p class="d-flex justify-content-end">Shipping from <br> {{ $annonce->ville}}</p>
              @foreach ($annonce->photographies as $photo)
                  <img height="200px" src="{{ asset('storage/' . $photo->photographie) }}">
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

          <div class="card">
  <div class="card-header"><h5>Comments</h5></div>


    @foreach ($annonce->comments as $comment)
      <div class="card-body">

          <a href="/users/{{ $comment->user->id}}">{{"@".$comment->user->name}}</a>

          <strong>
              {{ $comment->created_at->diffForHumans()}}: &nbsp;
          </strong>

            {{ $comment->comment}}
      </div>
    @endforeach

</div>
  @if (Auth::check())
<div class="card">
  <div class="card-header">{{ __('Add a comment') }}</div>
  <div class="card-body">
      <form method="POST" action="{{ route('annonces.comment', $annonce->id)}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
          @csrf

          <div class="form-group row">
              <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

              <div class="col-md-6">
                  <input id="comment" type="text-area" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" placeholder="Your Comment Here..." required autofocus>

              </div>
          </div>

          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-link">
                      {{ __('Add') }}
                  </button>
              </div>
          </div>
      </form>
@endif
      @include ('layouts.errors')

  </div>
</div>
        </div>
      </div>
    </div>
  </div>
@endsection
