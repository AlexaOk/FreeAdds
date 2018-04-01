<tr>
  <td><h4><a href="/users/{{ $user->id}}">
    {{$user->name}}
  </a></h4></td>
  <td>{{$user->ville}}</td>
  <td>
    {{ ucfirst($user->email) }}
  </td>
</tr>
