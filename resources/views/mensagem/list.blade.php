<h1>Lista de Mensagens</h1>
<hr>

<!--Exibe mensagens de sucesso-->
@if(\Session::has('success'))
	<div class="container">
		<div class="alert alert-success">
			{{\Session::get('success')}}
		  </div>
		</div>
	@endif

@foreach($mensagens as $mensagem)
	<h3>{{$mensagem->autor}}</h3>
	<p><a href="/mensagens/{{$mensagem->id}}">{{$mensagem->titulo}}</a></p>
	<p>{{$mensagem->texto}}</p>
	<a href="/mensagens/{{$mensagem->id}}">Visualizar</a>
	<a href="/mensagens/{{$mensagem->id}}/edit">Editar</a>
	<a href="/mensagens/{{$mensagem->id}}/delete">Deletar</a>
	<br>
@endforeach



<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->