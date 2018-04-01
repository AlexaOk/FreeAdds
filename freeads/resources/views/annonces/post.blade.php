<tr>
  <td><h4><a href="/annonces/{{ $annonce->id}}">
    {{$annonce->titre}}
  </a></h4></td>
  <td>{{$annonce->description}}</td>
  <td>
     @foreach ($annonce->photographies as $photo)
      <img   height="130px" src="{{ asset('storage/' . $photo->photographie) }}"/>
    @endforeach
  </td>
  <td>
    {{ ucfirst($annonce->couleur) }}
    <br>
    Size : {{ $annonce->taille}}
    <br>
    {{ $annonce->prix}} €
    <br>
    {{ $annonce->catégorie}}
    <br>
    Seller : <a href="/users/{{ $annonce->user->id}}">{{ "@".$annonce->user->name}}</a>
    <br>
      <a href="/annonces/{{ $annonce->id }}">{{$annonce->comments->count() }} comments</a>
  </td>
</tr>
