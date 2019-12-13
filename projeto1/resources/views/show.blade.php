<!DOCTYPE html>
<html>
<head>
<title>alunos - {{$aluno->nome }} do if</title>
</head>
<body>
 <h1> aluno - {{$aluno->nome }} do if </h1>
 <ul>

 <li> <strong>Id: </strong> {{$aluno->id}} </li>
 <li><strong>Nome: </strong>{{$aluno->nome}} </li>

 </ul>
 <a href="javascript:history.go(-1)">voltar</a>
</body>
</html>