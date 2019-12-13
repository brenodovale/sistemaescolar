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

	<center><h3>{{$nome}} Disciplina</h3></center>
	@if (isset($disciplinaid))
	<form class="form" method="post" action="{{route('disciplinas.update', $disciplinaid->id)}}">
		@method('PUT')

		<div class="form-group">
			<input type="hidden" name="id" class="form-control" value="{{$disciplinaid->id ?? old('id')}}" readonly>
		</div>

	@else

	<form class="form" method="post" action="{{route('disciplinas.store')}}">
	@endif	
		@csrf <!-- token  -->
		<div class="form-group">
			<label>Nome Disciplina:</label>
			<input type="text" name="nomedisciplina" class="form-control" value="{{$disciplinaid->nomedisciplina ?? old('nomedisciplina')}}">
		</div>

		<div class="form-group">
			<label>Professor:</label>
			<select class="form-control" name="idprofessor">
				<option value="">Selecione um Professor</option>
			@foreach ($professores as $professor)
				<option value="{{$professor->id}}"
					@if (isset($disciplinaid) && $disciplinaid->professor ==  $professor)
						selected
					@endif				
				>{{$professor->nomeprofessor}}</option>
			@endforeach
		</select>
			
		</div>

		<div class="form-group">
			<label>Valor Disciplina:</label>
			<input type="number" name="valordisciplina" class="form-control" min="1" step="0.01" value="{{$disciplinaid->valordisciplina ?? old('valordisciplina')}}">
		</div>
		

		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>

@endsection('content')
