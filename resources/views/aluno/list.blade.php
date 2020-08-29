@extends('layouts.app')
@section('content')

<label for="">Lista de Alunos</label> <br />

<form action="{{ route('procurar_aluno')}}" method="GET">
    <input type="text" id="name" name="name" placeholder="Nome" />
    <input type="text" id="email" name="email" placeholder="Email" />
    <input type="text" id="matricula" name="matricula" placeholder="Matrícula" />
    <button>Procurar</button>
</form>

<br>
<a class="btn btn-success" href="{{route('cadastro_aluno')}}">Cadastrar Aluno</a>
<br>
<br>
<table class="table">
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Matrícula</th>
        <th>Nascimento</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->registration }}</td>
            <td>{{ $user->birthday }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('editar_aluno', $user->id)}}">Editar</a>
                <a class="btn btn-danger" href="{{route('excluir_aluno', $user->id)}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection