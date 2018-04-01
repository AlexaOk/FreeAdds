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
                <label for="catégorie" class="col-md-4 col-form-label text-md-right">{{ __('Catégorie') }}</label>

                <div class="col-md-6">
                  {{-- <input id="catégorie" type="catégorie" class="form-control{{ $errors->has('catégorie') ? ' is-invalid' : '' }}" name="catégorie" value="{{ old('catégorie') }}" required> --}}
                  <select name="catégorie" class="form-control">
                    <option value="">Catégorie</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Jewelleries">Jewelleries</option>
                    <option value="Toys">Toys</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Other">Other</option>
                  </select>
                  {{-- @if ($errors->has('catégorie'))
                  <span class="invalid-feedback">
                  <strong>{{ $errors->first('catégorie') }}</strong>
                </span>
              @endif --}}
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
              <input id="photographie" type="file" class="form-control{{ $errors->has('photographie') ? ' is-invalid' : '' }}" name="photographie[]" multiple>
            </div>
          </div>

          <div class="form-group row">
            <label for="taille" class="col-md-4 col-form-label text-md-right">{{ __('Taille') }}</label>

            <div class="col-md-6">
              {{-- <input id="taille" type="taille" class="form-control{{ $errors->has('taille') ? ' is-invalid' : '' }}" name="taille" value="{{ old('taille') }}" required> --}}
              <select name="taille" class="form-control">
                <option value="">Taille</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="couleur" class="col-md-4 col-form-label text-md-right">{{ __('Couleur') }}</label>

            <div class="col-md-6">
              <input id="couleur" type="text" class="form-control{{ $errors->has('couleur') ? ' is-invalid' : '' }}" name="couleur" value="{{ $annonce->couleur }}" required>

              @if ($errors->has('couleur'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('couleur') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

            <div class="col-md-6">
              <input id="ville" type="text" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" name="ville" value="{{ $annonce->ville }}" required>

              @if ($errors->has('ville'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('ville') }}</strong>
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


          <div class="form-group row">
            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

            <div class="col-md-6">
              <input id="tags" type="tags" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" value="{{ $annonce->tags }}" required>
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
