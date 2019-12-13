@extends('templates.template') 


@section('content')

<div class="container">
<center><h3>Lista de Cursos</h3></center>

<a href="{{route('cursos.create')}}" class="btn btn-primary">Adicionar Curso</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Nome do Curso</th>
		<th>Valor do Curso</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($cursos as $curso)
		<tr>
			<td>{{$curso->id}}</td>
			<td>{{$curso->nomecurso}}</td>
			<td>{{$curso->valorcurso}}</td>
			<td >
				<a href="{{route('cursos.edit', $curso->id )}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{ route('cursos.destroy', $curso->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	
	{!! $cursos->links() !!}


</div>



@endsection('content')



