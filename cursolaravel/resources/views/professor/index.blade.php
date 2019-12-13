@extends('templates.template')


@section('content')

<div class="container">
<center><h3>Lista de Professores</h3></center>

<a href="{{route('professores.create')}}" class="btn btn-primary">Adicionar Professor</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nome do Professor</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($professors as $professor)
		<tr>
			<td>{{$professor->id}}</td>
			<td>{{$professor->nomeprofessor}}</td>
		
			<td >
				<a href="{{route('professores.edit', $professor->id )}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('professores.destroy', $professor->id )}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	
	{!! $professors->links() !!}


</div>

@endsection('content')

