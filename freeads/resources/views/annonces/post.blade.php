<div class="blog-post">
  <h2 class="blog-post-title">
    <a href="/annonces/{{ $annonce->id}}">
      {{$annonce->titre}}
    </a>
  </h2>
  <p class="blog-post-meta">
    Posted on : {{ $annonce->created_at->toFormattedDateString()}}
    <br>
    Seller : <a href="#">{{"@".$annonce->user->name}}</a>
  </p>

  {{$annonce->content}}
  <br>
  {{$annonce->description}}
  <br>
  @foreach ($annonce->photographies as $photo)
    <img   width="15%" height="15%" src="{{ asset('storage/' . $photo->photographie) }}"/>
  @endforeach
  <br>
  {{$annonce->prix}} €

</div>
