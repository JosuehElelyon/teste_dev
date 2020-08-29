<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;


class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $cursos = Curso::all();
        return view('curso.list', ['cursos' => $cursos]); // Aqui eu criei a função para ser chhamada na view

    }

    public function create()
    {
        return view('curso.create', ['curso' => '']); // Aqui eu criei a função para ser chhamada na view

    }

    public function store(Request $request) // Aqui ela vai salavar os dados, Dessa forma vou  obter os dados que estão sendo enviados pelo formulário.
    {
        if ($request->id) {
            $curso = Curso::findOrFail($request->id);
            $curso->name = $request->name;
            $curso->description = $request->description;
            $curso->save();
        } else {
            Curso::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }
        return $this->list();
    }

    public function show($id)
    {
        $Curso = Curso::findOrFail($id); //findOrFail(), que recebe o id como argumento e usa para tentar encontrar o registro na tabela
        return view('curso.show', ['curso' => $Curso]);
    }

    public function edit($id)
    {
        $Curso = Curso::findOrFail($id);
        return view('curso.create', ['curso' => $Curso]); // Aqui eu criei a função para ser chhamada na view

    }


    public function delete($id)
    {
        $Curso = Curso::findOrFail($id);
        $Curso->delete($id);
        return $this->list(); // Aqui eu criei a função para voltarv para a lista

    }
}
