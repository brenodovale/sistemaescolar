@extends('templates.template')



@section('content')

<div class="container">
<center><h3>Lista de Alunos</h3></center>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<a href="{{route('alunos.create')}}" class="btn btn-primary">Adicionar Aluno</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nome do Aluno</th>
		<th>Nº Matricula</th>
		<th>Status</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($alunos as $aluno)
		<tr>
			<td>{{$aluno->id}}</td>
			<td>{{$aluno->nomealuno}}</td>
			<td>{{$aluno->nmatricula}}</td>
			<td>{{$aluno->status}}</td>
		
			<td >
				<a href="{{route('alunos.edit', $aluno->id)}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('alunos.destroy', $aluno->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	
	{!! $alunos->links() !!}


</div>

@endsection('content')
