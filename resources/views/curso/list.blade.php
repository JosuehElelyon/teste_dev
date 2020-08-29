@extends('layouts.app')
@section('content')

<label for="">Lista de Cursos</label> <br />

<a class="btn btn-success" href="{{route('cadastro_curso')}}">Cadastrar Curso</a>
<br>
<br>

<table class="table">
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
        <tr>
            <td>{{ $curso->id }}</td>
            <td>{{ $curso->name }}</td>
            <td>{{ $curso->description }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('editar_curso', $curso->id)}}">Editar Curso</a>
                <a class="btn btn-danger" href="{{route('excluir_curso', $curso->id)}}">Excluir Curso</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection