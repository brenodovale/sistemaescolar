@extends('templates.template') 


@section('content')



<div class="container">
<center><h3>Lista de Turmas</h3></center>

<a href="{{route('turmas.create')}}" class="btn btn-primary">Adicionar Turma</a>
<br><br>
<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Turma</th>
		<th>Editar</th>
		<th>Excluir</th>
	</tr>

	@foreach($turmas as $turma)
		<tr>
			<td>{{$turma->id}}</td>
			<td>{{$turma->nometurma}}</td>
		
			<td >
				<a href="{{route('turmas.edit', $turma->id )}}" class="btn btn-warning">Editar</a>	
				
				

			</td>

			<td>
				<form action="{{route('turmas.destroy', $turma->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>	

			</td>

			
		</tr>

	@endforeach
</table>
	
	{!! $turmas->links() !!}


</div>


@endsection('content')
