@extends('templates.template')

@section('content')

<div class="container">
<center><h3>Alunos Matriculados</h3></center>

	<!-- mesagens sucesso e erro ao cadastrar -->
	@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{session('danger')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!-- fim das mensagens de cadastrar -->

<a href="{{route('matriculas.create')}}" class="btn btn-primary">Matricular Aluno</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id Matricula</th>
		<th>Nome do Aluno</th>
		<th>Curso</th>
		<th>Semestre</th>
		<th>Turma</th>
		<th>Valor da Matricula</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($matriculas as $matricula)
		<tr>
			<td>{{$matricula->id}}</td>
			<td>{{$matricula->aluno->nomealuno}}</td>
			<td>{{$matricula->curso->nomecurso}}</td>
			<td>{{$matricula->semestre->ano}}</td>
			<td>{{$matricula->turma->nometurma}}</td>
			<td>{{$matricula->valormatricula}}</td>

		
			<td >
				<a href="{{route('matriculas.edit', $matricula->id)}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('matriculas.destroy', $matricula->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	
	{!! $matriculas->links() !!}


</div>

@endsection('content')