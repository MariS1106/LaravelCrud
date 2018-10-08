@extends('layouts.app')

@section('content')
<h1>Formulário de Edição da Mensagem</h1>
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

<form action="/mensagens/{{$mensagem->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	Autor: <input type="text" name="autor" value="{{$mensagem->autor}}">  <br>
	Título: <input type="text" name="titulo" value="{{$mensagem->titulo}}">  <br>
	Texto: <input type="text" name="texto" value="{{$mensagem->texto}}"> 
<input type="submit" value="Salvar">

</form>

@endsection

