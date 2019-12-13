@extends('templates.template')


@section('content')

<div class="container">

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

	<center><h3>{{$nome}} Curso</h3></center>
	@if (isset($cursoid))
	<form class="form" method="post" action="{{route('cursos.update', $cursoid->id)}}">
		@method('PUT')

		<div class="form-group">
			<input type="hidden" name="id" class="form-control" value="{{$cursoid->id ?? old('id')}}" readonly>
		</div>

	@else

	<form class="form" method="post" action="{{route('cursos.store')}}">
	@endif	
		@csrf <!-- token  -->
		<div class="form-group">
			<label>Nome do Curso:</label>
			<input type="text" name="nomecurso" class="form-control" value="{{$cursoid->nomecurso ?? old('nomecurso')}}">
		</div>
		<div class="form-group">
			<label>Valor do Curso:</label>
			<input type="number" name="valorcurso" class="form-control" min="1" step="0.01" value="{{$cursoid->valorcurso ?? old('valorcurso')}}">
		</div>

		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>

@endsection('content')