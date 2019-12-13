@extends('templates.template') 



@section('content')

<div class="container">


	<center><h3> {{$nome}} Nota de Aluno Em Diciplina</h3></center>


	@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>
    </div>
@endif
		<!-- mesagens sucesso e erro ao cadastrar -->
		@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{session('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!-- fim das mensagens de cadastrar -->


	@if (isset($notaid))
	<form class="form" method="post" action="">
		@method('PUT')

		<div class="form-group">
			<input type="text" name="id" class="form-control" value="{{$notaid->id ?? old('id')}}" readonly>
		</div>

	@else

	<form class="form" method="post" action="{{route('notas.store')}}">
	@endif	
		@csrf <!-- token  -->

        <div class="form-group">
    		<label>Aluno e Disciplina</label>
		    <select class="form-control" name="idmatdisciplinas">
		    	<option value="">Selecione um Aluno e Disciplina</option>
		    	@foreach($matdisciplinas as $matdisciplina)
		      <option value="{{$matdisciplina->id}}"
			  	@if (isset($notaid) && $notaid->idmatdisciplinas ==  $matdisciplina)
						selected
				@endif	
			  >{{$matdisciplina->matricula->aluno->nomealuno}}  {{" "}} {{$matdisciplina->disciplina->nomedisciplina}}</option>
		   		@endforeach
		    </select>
  		</div>

        <div class="form-group">
			<label>Nota:</label>
			<input type="number" name="nota" class="form-control" min="0" max="10" step="0.01" value="{{$notaid->nota ?? old('nota')}}">
		</div>

        <div class="form-group">
			<label>Refencia:</label>
			<select class="form-control" name="referencia">
				<option value="1º Avaliação">1º Avaliação</option>
				<option value="2º Avaliação">2º Avaliação</option>
				<option value="3º Avaliação">3º Avaliação</option>
			</select>
		</div>

  		
		
		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>


@endsection('content')




@section('scripts')

@endsection('scripts')



