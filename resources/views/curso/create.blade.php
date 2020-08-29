<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="windth=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Cursos</title>

</head>

<body>
    <div id="area">

        <form action="{{ route('salvar_curso')}}" method="POST">
            <fieldset>
                <!-- Aqui está vindo a rota la de web.php-->
                <!-- Aqui esta enviando para a controller-->
                @csrf
                <!-- componente de segurança,  impedir que sejam enviadas informações de outros lugares que não seja da aplicação aplicação-->
                <label for="">Nome do Curso</label> <br />

                @if ($curso)
                <input type="hidden" name="id" value="{{$curso->id}}"> <br />
                <input type="text" name="name" value="{{$curso->name}}"> <br />
                <label for="">Descrição do Curso</label> <br />
                <input type="text" name="description" value="{{$curso->description}}"> <br />

                @else
                <input type="text" name="name"> <br />
                <label for="">Descrição do Curso</label> <br />
                <input type="text" name="description"> <br />

                @endif
                <h1>
                    <button>Salvar</button>
                </h1>
                <a href="{{ route('listar_curso') }}">Cancelar</a>
            </fieldset>
        </form>
    </div>
</body>


</html>