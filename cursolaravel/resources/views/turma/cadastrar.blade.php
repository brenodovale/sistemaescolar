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

	<center><h3>{{$nome}} Turma</h3></center>
	@if (isset($nometurmaid))
	<form class="form" method="post" action="{{route('turmas.update', $nometurmaid->id)}}">
		@method('PUT')

	@else

	<form class="form" method="post" action="{{route('turmas.store')}}">
	@endif	
		@csrf <!-- token  -->
		<div class="form-group">
			<label>Turma:</label>
			<input type="text" name="nometurma" class="form-control" value="{{$nometurmaid->nometurma ?? old('nometurma')}}">
		</div>
		

		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>

@endsection('content')