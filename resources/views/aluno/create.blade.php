<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="windth=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/estiloie.css">
    <![endif]-->

</head>

<body>
    <div id="area">

        <form action="{{ route('salvar_aluno') }}" method="POST">
            <!-- Aqui esta enviando para a controller-->
            <fieldset>
                @csrf
                <!-- componente de segurança,  impedir que sejam enviadas informações de outros lugares que não seja da aplicação aplicação-->
                @if ($user)
                <input type="hidden" id="cursos-aluno" value="{{$user->cursos}}" />
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="password" value="{{$user->password}}">
                <label for="">Nome do Aluno</label> <br />
                <input type="text" name="name" value="{{$user->name}}" required>
                <br /><br />
                <label for="">E-mail</label><br />
                <input type="email" name="email" value="{{$user->email}}" required>
                <br /><br />
                <label for="">Matrícula</label><br />
                <input type="text" name="registration" value="{{$user->registration}}" disabled>
                <br /><br />
                <label for="">Data de Nascimento</label><br />
                <input type="date" name="birthday" value="{{$user->birthday}}" required>
                <br /><br />
                <label for="">Cursos</label> </br>

                @foreach ($cursos as $curso)
                <div>
                    <input type="checkbox" id="cursos-{{$curso->id}}" name="cursos[]" value="{{$curso->id}}">
                    <label for="cursos-{{$curso->id}}"> {{$curso->id}} {{$curso->name}} - <small>{{$curso->description}}</small></label>
                </div>

                @endforeach

                @else
                <label for="">Nome do Aluno</label> <br />
                <input type="text" name="name" required>
                <br /><br />
                <label for="">E-mail</label> <br />
                <input type="email" name="email" required>
                <br /><br />
                <label for="">Data de Nascimento</label> <br />
                <input type="date" name="birthday" required>
                <br /><br />
                <label for="">Senha</label> <br />
                <input type="password" name="password" required>
                <br /><br />
                <label for="">Cursos</label> </br>
                @foreach ($cursos as $curso)
                <div>
                    <input type="checkbox" id="cursos-{{$curso->id}}" name="cursos[]" value="{{$curso->id}}">
                    <label for="cursos-{{$curso->id}}"> {{$curso->name}} - <small>{{$curso->description}}</small></label>
                </div>
                @endforeach
                @endif
                <h1>
                    <button>Salvar</button>
                </h1>
                <a href="{{ route('listar_aluno') }}">Cancelar</a>

            </fieldset>

        </form>
    </div>

    <script>
        var cursos = document.getElementById('cursos-aluno').value

        cursos.split(',').forEach(function(valor) {
            var elemento = document.getElementById('cursos-' + valor)
            if (elemento) {
                elemento.checked = true;
            }
        })
    </script>
</body>


</html>