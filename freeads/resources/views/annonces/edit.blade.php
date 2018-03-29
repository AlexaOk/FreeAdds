@extends('layouts.app')

@section ('content')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header justify-content-center">{{ __('Edit') }} {{ $annonce->titre }}
                    @foreach ($annonce->photographies as $photo)
                        <img width="5%" src="{{ asset('storage/' . $photo->photographie) }}">
                    @endforeach
                  </div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('annonces.update', $annonce->id)}}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                          @csrf
                          <div class="form-group row">

                              <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                              <div class="col-md-6">
                                  <input id="titre" type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre"  value="{{$annonce->titre}}" required autofocus>

                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                              <div class="col-md-6">
                                  <input id="description" type="text-area" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{$annonce->description}}" required autofocus>

                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="photographie" class="col-md-4 col-form-label text-md-right">{{ __('Photographie') }}</label>

                              <div class="col-md-6">
                                  <input id="photographie" type="file" class="form-control{{ $errors->has('photographie') ? ' is-invalid' : '' }}" name="photographie[]" required multiple>

                                  @if ($errors->has('photographie'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('photographie') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>

                              <div class="col-md-6">
                                  <input id="prix" type="number" step="any" class="form-control{{ $errors->has('prix') ? ' is-invalid' : '' }}" name="prix" value="{{$annonce->prix}}" required autofocus>

                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Send') }}
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
