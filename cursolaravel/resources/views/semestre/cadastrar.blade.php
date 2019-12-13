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

	<center><h3>{{$nome}} Semestre</h3></center>
	@if (isset($anoid))
	<form class="form" method="post" action="{{route('semestres.update', $anoid->id)}}">
		@method('PUT')

	@else

	<form class="form" method="post" action="{{route('semestres.store')}}">
	@endif	
		@csrf <!-- token  -->
		<div class="form-group">
			<label>Ano:</label>
			<input type="text" name="ano" class="form-control" value="{{$anoid->ano ?? old('ano')}}">
		</div>
		

		<button class="btn btn-primary" type="submit">{{$nome}} </button>
	</form>



</div>

@endsection('content')