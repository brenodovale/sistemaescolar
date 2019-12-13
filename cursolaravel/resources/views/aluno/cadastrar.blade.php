@extends('templates.template')


@section('content')


<div class="container">


	<center><h3>{{$nome}} Aluno</h3></center>
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
@if(session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{session('danger')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!-- fim das mensagens de cadastrar -->

<!-- mesagens de sucesso e errro ao atualizar -->
@if(session('success-update'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session('successupdate')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('danger-update'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{session('danger-update')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!-- fim das mensagens de atualizar -->
	@if (isset($alunoid))
	<form class="form" method="post" action="{{route('alunos.update', $alunoid->id)}}">
		@method('PUT')

		<div class="form-group">
			<input type="hidden" name="id" class="form-control" value="{{$alunoid->id ?? old('id')}}" readonly>
		</div>


	@else

	<form class="form" method="post" action="{{route('alunos.store')}}">
	@endif
	
		@csrf <!-- token  -->
		<div class="form-group">
			<label>Nome do Aluno:</label>
			<input type="text" name="nomealuno" class="form-control" value="{{$alunoid->nomealuno ?? old('nomealuno')}}" >
		</div>
	
		<div class="form-group">
			<label>Numero de Matricula:</label>
			<input type="number" name="nmatricula" min='80000' class="form-control" value="{{$alunoid->nmatricula ?? old('nmatricula')}}" {{$string}}>
		</div>

		<div class="form-check">		
			  <input class="form-check-input" type="radio" name="status"  value="AT" checked>
			  <label class="form-check-label" >
				Ativo
			</label>
		</div>
		
		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>

@endsection('content')