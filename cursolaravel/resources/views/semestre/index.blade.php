@extends('templates.template') 


@section('content')



<div class="container">
<center><h3>Lista de Semestres</h3></center>

<a href="{{route('semestres.create')}}" class="btn btn-primary">Adicionar Semestre</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Ano</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($semestres as $semestre)
		<tr>
			<td>{{$semestre->id}}</td>
			<td>{{$semestre->ano}}</td>
		
			<td >
				<a href="{{route('semestres.edit', $semestre->id )}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('semestres.destroy', $semestre->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	
	{!! $semestres->links() !!}


</div>


@endsection('content')
