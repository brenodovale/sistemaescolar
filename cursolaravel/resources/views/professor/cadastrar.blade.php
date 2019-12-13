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

	<center><h3>{{$nome}} Professor</h3></center>
	@if (isset($professorid))
	<form class="form" method="post" action="{{route('professores.update', $professorid->id)}}">
		@method('PUT')

	@else

	<form class="form" method="post" action="{{route('professores.store')}}">
	@endif	
		@csrf <!-- token  -->
		<div class="form-group">
			<label>Nome do Professor:</label>
			<input type="text" name="nomeprofessor" class="form-control" value="{{$professorid->nomeprofessor ?? old('nomeprofessor')}}">
		</div>
		

		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>

@endsection('content')