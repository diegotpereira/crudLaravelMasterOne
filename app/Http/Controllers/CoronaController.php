<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corona;

class CoronaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coronacases = Corona::all();
        return view('coronas.index', compact('coronacases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coronas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData  = $request->validate([
            'country_name'=> 'required|max:255',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        $show = Corona::create($validatedData);
        return redirect('/coronas')->with('success', 'Dados de Corona adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coronacase = Corona::findOrFail($id);
        return view('coronas.show', compact('coronacase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coronacase = Corona::findOrFail($id);
        return view('coronas.edit', compact('coronacase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
            'symptoms' => 'required',
            'cases' => 'required|numeric',
        ]);
        Corona::whereId($id)->update($validatedData);
        return redirect('/coronas')->with('success', 'Dados de Corona atualizado com sucesso!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coronacase = Corona::findOrFail($id);
        $coronacase->delete();
        return redirect('/coronas')->with('success', 'Dados de Corona removido com sucesso!.');
    }
}
