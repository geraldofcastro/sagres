<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::paginate(5);
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (Aluno::create($data)) {
            return redirect()->route('alunos.index')
                             ->with('success', 'Aluno cadastrado com sucesso!');
        }
        
        return redirect()->route('alunos.index')
                         ->with('error', 'Erro ao cadastrar aluno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        $notas = DB::select("select avg(notas.nota) as media, disciplinas.disciplina from notas inner join disciplinas on notas.disciplina_id = disciplinas.id where aluno_id = ". $aluno->id ." group by  disciplinas.disciplina");
        return view('alunos.show', compact('aluno', 'notas'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {

        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        $result = $aluno->update($request->all());

        if ($result) {
            $request->session()->flash('success', 'Aluno atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar aluno');
        }
        
        return redirect()->route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno, Request $request)
    {
        if ($aluno->delete()) {
            $request->session()->flash('success', 'Aluno deletado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar aluno');
        }

        return redirect()->route('alunos.index');
    }
}
