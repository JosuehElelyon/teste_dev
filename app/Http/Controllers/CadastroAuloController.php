<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class CadastroAuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $users = User::all();
        return view('aluno.list', ['users' => $users]); // Aqui eu criei a função para ser chhamada na view
    }

    public function search(Request $request)
    {
        // dd($request->query());
        $name = $request->query('name');
        $email = $request->query('email');
        $matricula = $request->query('matricula');

        $users = new User();
        $users = $users->query();
        if ($name) {
            $users->where(
                'name',
                'like',
                '%' . $name . '%'
            );
        }
        if ($email) {
            $users->orWhere(
                'email',
                $email
            );
        }
        if ($matricula) {
            $users->orWhere(
                'registration',
                $matricula
            );
        }

        return view('aluno.list', ['users' => $users->get()]); // Aqui eu criei a função para ser chhamada na view
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('aluno.create', ['user' => '', 'cursos' => $cursos]); // Aqui eu criei a função para ser chhamada na view
    }

    public function store(Request $request) // Aqui ela vai salavar os dados, Dessa forma vou  obter os dados que estão sendo enviados pelo formulário.
    {
        //dd($request->all()); // Aqui é um debug
        if ($request->id) {
            $user = User::findOrFail($request->id);
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->birthday = $request->birthday;
            $user->cursos = implode(',', $request->cursos);
            $user->save();
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'registration' => rand(),
                'birthday' => $request->birthday,
                'cursos' => implode(',', $request->cursos)
            ]);
        }

        return $this->list();
    }

    public function show($id)
    {
        $User = User::findOrFail($id); //findOrFail(), que recebe o id como argumento e usa para tentar encontrar o registro na tabela
        return view('aluno.show', ['user' => $User]);
    }

    public function edit($id)
    {
        $User = User::findOrFail($id);
        $cursos = Curso::all();
        return view('aluno.create', ['user' => $User, 'cursos' => $cursos]); // Aqui eu criei a função para ser chhamada na view

    }


    public function delete($id)
    {
        $User = User::findOrFail($id);
        $User->delete($id);
        return $this->list();
    }
}
