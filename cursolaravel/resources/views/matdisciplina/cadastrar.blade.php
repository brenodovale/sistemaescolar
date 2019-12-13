@extends('templates.template') 


@section('content')


<div class="container">

	<center><h3> {{$nome}} Aluno Em Diciplina</h3></center>
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




	@if (isset($matdisciplinaid))
	<form class="form" method="post" action="{{route('matdisciplinas.update', $matdisciplinaid->id)}}">
		@method('PUT')

	@else

	<form class="form" method="post" action="{{route('matdisciplinas.store')}}">
	@endif	
		@csrf <!-- token  -->

		<div class="form-group">
    		<label>Aluno</label>
		    <select class="form-control" name="idmatricula">
		    	<option value="">Selecione um Aluno</option>
		    	@foreach($matriculas as $matricula)
		      <option value="{{$matricula->id}}"
			  	@if (isset($matdisciplinaid) && $matdisciplinaid->matricula ==  $matricula)
						selected
				@endif	
			  >{{$matricula->aluno->nomealuno}}</option>
		   		@endforeach
		    </select>
  		</div>

          <div class="form-group">
    		<label>Disciplina</label>
		    <select class="form-control" name="iddisciplina">
		    	<option value="">Selecione uma Diciplina</option>
		    	@foreach($disciplinas as $disciplina)
		      <option value="{{$disciplina->id}}"
			  	@if (isset($matdisciplinaid) && $matdisciplinaid->disciplina ==  $disciplina)
						selected
				@endif
			  
			  >{{$disciplina->nomedisciplina}}</option>
		   		@endforeach
		    </select>
  		</div>

          <div class="form-group">
			<label>Valor:</label>
			<input type="number" name="valor" class="form-control" min="1" step="0.01" value="{{$matdisciplinaid->valor ?? old('valor')}}">
		</div>

  		
		
		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>


@endsection('content')