@extends('templates.template')

@section('content')

<div class="container">
<center><h3>Lista de Disciplinas</h3></center>

<a href="{{route('disciplinas.create')}}" class="btn btn-primary">Adicionar Disciplina</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nome da Disciplina</th>
		<th>Professor</th>
		<th>Valor</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($disciplinas as $disciplina)
		<tr>
			<td>{{$disciplina->id}}</td>
			<td>{{$disciplina->nomedisciplina}}</td>
			<td>{{$disciplina->professor->nomeprofessor}}</td>
			<td>{{$disciplina->valordisciplina}}</td>
			

		
			<td >
				<a href="{{route('disciplinas.edit', $disciplina->id)}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('disciplinas.destroy', $disciplina->id)}}" method="post">
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