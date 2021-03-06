<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">Breno do Vale</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
        <a class="nav-link" href="{{route('alunos.index')}}">Alunos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('professores.index')}}">Professores </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('semestres.index')}}">Semestres </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('cursos.index')}}">Cursos </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('disciplinas.index')}}">Disciplinas </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('turmas.index')}}">Turmas</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Secretaria
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('matriculas.index')}}">Matricular Aluno</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('matdisciplinas.index')}}">Matricular Aluno/Disciplina</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('notas.index')}}">Lançar Notas</a>
        </div>
      </li>
    </ul>
    <span class="navbar-text" >
      <a href="{{route('sair')}}"> Deseja sair ?</a>
      
    </span>
  </div>
</nav>


<body>



@yield('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

@yield('scripts')
    
</body>
</html>


