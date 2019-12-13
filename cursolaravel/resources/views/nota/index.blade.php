@extends('templates.template')

@section('content')

<div class="container">
<center><h3>Alunos Matriculados em Disciplina</h3></center>

<a href="{{route('notas.create')}}" class="btn btn-primary">Lançar Notas</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id Nota</th>
		<th>Id matdisciplina/Aluno</th>
		<th>Nota</th>
		<th>Rerefencia </th>
		<th>Status</th>
		

		<!-- <th>Editar</th> -->
        <th>Excluir</th>
	</tr>

	@foreach($notas as $nota)
		<tr>
			<td>{{$nota->id}}</td>
			<td>{{$nota->idmatdisciplinas}}</td>
			<td>{{$nota->nota}}</td>
			<td>{{$nota->referencia}}</td>
			<td>{{$nota->status}}</td>
			

		
			<!-- <td >
				<a href="{{route('notas.edit', $nota->id)}}" class="btn btn-warning">Editar</a>
			</td> -->

            <td >
				<form action="{{route('notas.destroy', $nota->id)}}" method="post">
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