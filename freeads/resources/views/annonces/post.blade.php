<tr>
  <td><h4><a href="/annonces/{{ $annonce->id}}">
    {{$annonce->titre}}
  </a></h4></td>
  <td>{{$annonce->description}}</td>
  <td>
     @foreach ($annonce->photographies as $photo)
      <img   width="30%" height="30%" src="{{ asset('storage/' . $photo->photographie) }}"/>
    @endforeach
  </td>
  <td>
    {{ ucfirst($annonce->couleur) }}
    <br>
    Size : {{ $annonce->taille}}
    <br>
    {{ $annonce->prix}} €
    <br>
    Catégorie {{ $annonce->catégorie}} Category
    <br>
    Seller : <a href="#">{{ "@".$annonce->user->name}}</a>
  </td>
</tr>
