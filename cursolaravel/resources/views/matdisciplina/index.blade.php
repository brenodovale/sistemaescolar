@extends('templates.template')

@section('content')

<div class="container">
<center><h3>Alunos Matriculados em Disciplina</h3></center>

<a href="{{route('matdisciplinas.create')}}" class="btn btn-primary">Matricular Aluno em Disciplina</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id MatDisciplina</th>
		<th>Aluno</th>
		<th>Disciplina</th>
		<th>Media</th>
		<th>Status</th>
		
		<th>Valor</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($matdisciplinas as $matdisciplina)
		<tr>
			<td>{{$matdisciplina->id}}</td>
			<td>{{$matdisciplina->matricula->aluno->nomealuno}}</td>
			<td>{{$matdisciplina->disciplina->nomedisciplina}}</td>
			<td>{{$matdisciplina->media}}</td>
			<td>{{$matdisciplina->status}}</td>
			
			<td>{{$matdisciplina->valor}}</td>

		
			<td >
				<a href="{{route('matdisciplinas.edit', $matdisciplina->id)}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('matdisciplinas.destroy', $matdisciplina->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	



</div>

@endsection('content')