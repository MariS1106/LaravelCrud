<h1>Formulário de Cadastro de Mensagem</h1>
<hr>

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
	<div class="container">
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	      <li>{{ $error }}</li>
	      @endforeach
	    </ul>
	  </div>
	</div>
  @endif

<form action="/mensagens" method="POST">
	{{ csrf_field() }}
	Autor: <input type="text" name="autor"> <br>
	Titulo: <input type="text" name="titulo"> <br>
	Texto: <input type="text" name="texto"> <br>
	<input type="submit" value="Salvar">
	</form>

