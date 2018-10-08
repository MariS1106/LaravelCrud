@extends('layouts.app')

@section('content')

<h1>Atividades <span class="badge badge-secondary">{{$atividade->id}}</span></h1>
<hr>
<p class="h5"><b>ID:</b> {{$atividade->id}}</p>
<p class="h5"><b>Título:</b> {{$atividade->scheduledto}}</p>
<p class="h5"><b>Descrição:</b> {{$atividade->description}}</p>
<p class="h5"><b>Criada em:</b> {{$atividade->created_at}}</p>
<p class="h5"><b>Atualizada em:</b> {{$atividade->updated_at}}</p>


<br>
<br>

<h1>Mensagens Relacionadas:</h1>
<table id="tabela" name="tabela"  class="table table-striped ">
    <thead>
       <tr>
            <td>Data</td>
            <td>Título</td>
            <td>Texto</td>
        </tr>
    </thead>
    <tbody>
        @foreach($atividade->mensagens as $msg)
	        <tr>
	            <td>{{$msg->created_at}}</td>
	            <td><a href="/mensagens/{{$msg->id}}">{{$msg->titulo}}</a></td>
	            <td>{{$msg->texto}}</td>
	        </tr>
        @endforeach
    </tbody>
</table>

<!-- \Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m')  -->

@endsection