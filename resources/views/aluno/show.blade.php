<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver aluno cadastrado</title>

</head>

<body>
    <label for="">Nome do Aluno</label> <br />
    <input type="text" name="Nome do Aluno" value="{{$user->name}}"> <br />
    <label for="">E-mail</label> <br />
    <input type="email" name="email" value="{{$user->email}}"> <br />
    <label for="">Data de Nascimento</label> <br />
    <input type="date" name="birthday" value="{{$user->birthday}}"> <br />
</body>

< </html>