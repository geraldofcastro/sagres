<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Aluno;
use App\Disciplina;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::paginate(5);

        return view('notas.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = Aluno::get();
        $disciplinas = disciplina::get();
        return view('notas.create', compact('alunos', 'disciplinas'));
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
        if (Nota::create($data)) {
            return redirect()->route('notas.index')
                             ->with('success', 'Nota cadastrada com sucesso!');
        }
        
        return redirect()->route('notas.index')
                         ->with('error', 'Erro ao cadastrar Nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        $alunos = Aluno::get();
        $disciplinas = Disciplina::get();

        return view('notas.edit', compact('nota', 'alunos', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $result = $nota->update($request->all());

        if ($result) {
            $request->session()->flash('success', 'Nota atualizada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar Nota');
        }
        
        return redirect()->route('notas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota, Request $request)
    {
        if ($nota->delete()) {
            $request->session()->flash('success', 'Nota deletada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar Nota');
        }

        return redirect()->route('notas.index');
    }
}
