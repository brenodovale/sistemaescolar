@extends('templates.template')

@section('content')

<div class="container">
<center><h3>Alunos Matriculados em Disciplina</h3></center>

<a href="{{route('matdisciplinas.create')}}" class="btn btn-primary">Visualizar Notas</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id Nota</th>
		<th>Id matdisciplina/Aluno</th>
		<th>Nota</th>
		<th>Rerefencia </th>
		<th>Status</th>
		

		<th>Editar</th>
        <th>Excluir</th>
	</tr>

	@foreach($notas as $nota)
		<tr>
			<td>{{$nota->id}}</td>
			<td>{{$nota->idmatdisciplinas}}</td>
			<td>{{$nota->nota}}</td>
			<td>{{$nota->referencia}}</td>
			<td>{{$nota->status}}</td>
			

		
			<td >
				<a href="" class="btn btn-warning">Editar</a>
			</td>

            <td >
				<a href="" class="btn btn-danger">Excluir</a>
			</td>


			
		</tr>

	@endforeach
</table>
	



</div>

@endsection('content')