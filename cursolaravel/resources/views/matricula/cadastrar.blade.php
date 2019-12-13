@extends('templates.template') 


@section('content')


<div class="container">



	<center><h3> {{$nome}} Aluno</h3></center>
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
	@if (isset($matriculaid))
	<form class="form" method="post" action="{{route('matriculas.update', $matriculaid->id)}}">
		@method('PUT')

	@else

	<form class="form" method="post" action="{{route('matriculas.store')}}">
	@endif	
		@csrf <!-- token  -->

		<div class="form-group">
    		<label>Aluno</label>
		    <select class="form-control" name="idaluno">
		    	<option value="">Selecione um Aluno</option>
		    	@foreach($alunos as $aluno)
		      <option value="{{$aluno->id}}"
			  	@if(isset($matriculaid) && $matriculaid->aluno ==  $aluno)
						selected
				@endif	
			  >{{$aluno->nomealuno}}</option>
		   		@endforeach
		    </select>
  		</div>

  		<div class="form-group">
    		<label>Curso</label>
		    <select class="form-control" name="idcurso">
		    	<option value="">Selecione um Curso</option>
		    	@foreach($cursos as $curso)
		      <option value="{{$curso->id}}"
			  	@if(isset($matriculaid) && $matriculaid->curso ==  $curso)
						selected
				@endif
			  >{{$curso->nomecurso}}</option>
		   		@endforeach
		    </select>
  		</div>


  		<div class="form-group">
    		<label>Turma</label>
		    <select class="form-control" name="idturma">
		    	<option value="">Selecione uma Turma</option>
		    	@foreach($turmas as $turma)
		      <option value="{{$turma->id}}"
			  	@if(isset($matriculaid) && $matriculaid->turma ==  $turma)
						selected
				@endif
			  >{{$turma->nometurma}}</option>
		   		@endforeach
		    </select>
  		</div>

  		<div class="form-group">
    		<label>Semestre</label>
		    <select class="form-control" name="idsemestre">
		    	<option value="">Selecione um Semestre</option>
		    	@foreach($semestres as $semestre)
		      <option value="{{$semestre->id}}"
			  	@if(isset($matriculaid) && $matriculaid->semestre ==  $semestre)
						selected
				@endif
			  >{{$semestre->ano}}</option>
		   		@endforeach
		    </select>
  		</div>

  		<div class="form-group">
  			<label>Valor Matricula</label>
  			<input type="number" class="form-control" name="valormatricula" min="1" step="0.01" value="{{$matriculaid->valormatricula ?? old('valormatricula')}}">
  		</div>
		
		
		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>


@endsection('content')