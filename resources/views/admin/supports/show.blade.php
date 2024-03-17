<h1>Detalhes do post: {{$support->id}}</h1>

<ul>
  <li>{{$support->subject}}</li>
  <li>{{$support->body}}</li>
  <li>{{$support->status}}</li>
</ul>

<form action="{{route('supports/destroy', $support->id)}}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit">Deletar</button>
</form>