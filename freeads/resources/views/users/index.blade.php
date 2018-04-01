@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-sm-12 blog-main">
          <div class="card justify-content-center">
            <div class="card-header"><h1>Sellers</h1></div>
            <div class="card-body">
        <table class="table table-striped">
          <tbody>
        @foreach ($users as $user)

          @include('users.post')

        @endforeach
      </table>
    </tbody>
      </div>


      <br>

      {{ $users->links() }}
    </div>
  </div>
</div>
</div>
</div>
@endsection
