<h1>Novo registro</h1>

<form action="{{route('supports/store')}}" method="POST">
  @csrf
  <input type="text" placeholder="Assunto" name="subject">
  <textarea name="body" cols="30" rows="5" placeholder="Descrição" name="body" ></textarea>
  <button type="submit">Enviar</button>
</form>