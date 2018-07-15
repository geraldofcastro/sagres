<?php

namespace App\Http\Controllers;

use App\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = Disciplina::paginate(5);
        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'disciplina' => 'required|min:4|max:255|unique:disciplinas'     
        ]);

        $data = $request->all();
        if (Disciplina::create($data)) {
            return redirect()->route('disciplinas.index')
                             ->with('success', 'Disciplina cadastrada com sucesso!');
        }
        
        return redirect()->route('disciplinas.index')
                         ->with('error', 'Erro ao cadastrar Disciplina');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        return view('disciplinas.edit', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        $result = $disciplina->update($request->all());

        if ($result) {
            $request->session()->flash('success', 'Disciplina atualizada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar Disciplina');
        }
        
        return redirect()->route('disciplinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina, Request $request)
    {
        if ($disciplina->delete()) {
            $request->session()->flash('success', 'Disciplina deletada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar Disciplina');
        }

        return redirect()->route('disciplinas.index');
    }
}
