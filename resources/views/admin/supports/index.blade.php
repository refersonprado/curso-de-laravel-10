<h1>Lista dos suportes</h1>

<a href="{{ route('supports/create') }}">Criar Dúvida</a>

<table>
  <thead>
    <th>Assunto</th>
    <th>Status</th>
    <th>Descrição</th>
    <th></th>
  </thead>
  <tbody>
    @foreach ($supports as $support)
      <tr>
        <td> {{ $support['subject'] }} </td>  
        <td> {{ $support['status'] }} </td>  
        <td> {{ $support['body'] }} </td>  
        <td>
            <a href=" {{route('supports/show', $support['id'])}} ">Visualizar</a>
        </td>
        <td>
          <a href="{{route('supports/edit', $support['id'])}}">Editar</a>
        </td>
      </tr>  
    @endforeach
  </tbody>
</table>