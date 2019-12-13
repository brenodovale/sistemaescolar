<!DOCTYPE html>
<html>
<head>
<title>FORMULARIO DE ALUNO</title>
</head>
<body>
 <h1> FORMULARIO DE ALUNO </h1>
 <ul>
 @foreach ($alunos as $aluno)
 <li>Id: <a href="http://projeto1.test/alunos/{{$aluno->id}}">{{$aluno->id}}</a></li>
 <li>Nome: <a href="http://projeto1.test/alunos/{{$aluno->id}}">{{$aluno->nome}}</a></li>
 <li> Matricula: <a href="http://projeto1.test/alunos/{{$aluno->id}}">{{$aluno->nmatricula}}</a></li>
 <li> Situação: <a href="http://projeto1.test/alunos/{{$aluno->id}}">{{$aluno->status}}</a></li> <br><br>
 @endforeach
 </ul>
</body>
</html>