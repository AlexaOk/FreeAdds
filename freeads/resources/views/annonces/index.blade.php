@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-sm-12 blog-main">
          <div class="card justify-content-center">
            <div class="card-header"><h1>Items</h1></div>
            <div class="card-body">

              @if(!Auth::guest())
              @if(Auth::user()->id == $annonce->user_id)
        <a class="btn btn-success" href="/annonces/new">Add new Item</a>
      @endif
      @endif
        <br>
        <br>
        <table class="table table-striped">
          <tbody>
        @foreach ($annonces as $annonce)

          @include('annonces.post')

        @endforeach
      </table>
    </tbody>
      </div>


      <br>

      {{ $annonces->links() }}
    </div>
  </div>
</div>
</div>
</div>
@endsection
