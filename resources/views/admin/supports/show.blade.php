<h1>Detalhes do post: {{$support->id}}</h1>
<p>{{formatDate($support->created_at)}}</p>

<ul>
  <li>{{$support->subject}}</li>
  <li>{{$support->body}}</li>
  <li>{{getStatusSupport($support->status)}}</li>
</ul>

<form action="{{route('supports/destroy', $support->id)}}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit">Deletar</button>
</form>