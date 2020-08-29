@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<a class="btn btn-outline-dark" href="{{ route('listar_aluno') }}">Visualizar alunos</a>
<a class="btn btn-outline-dark" href="{{ route('listar_curso') }}">Visualizar cursos</a>
@endsection