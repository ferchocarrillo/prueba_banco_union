<?php

namespace App\Http\Controllers;

    use App\Models\Cao_Fatura;
use App\Models\Consultor;
use App\Models\Permissao_Sistema;
use App\Models\Cao_Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $consultor = DB::table('cao_usuario')
            ->leftjoin(
                'permissao_sistema',
                'cao_usuario.co_usuario',
                'permissao_sistema.co_usuario'
            )
            ->where('cao_usuario.co_usuario', '!==', "")
            ->where('cao_usuario.co_usuario', '!==', null)
            ->where('permissao_sistema.co_sistema', 1)
            ->where('permissao_sistema.in_ativo', 'S')
            ->where('permissao_sistema.co_tipo_usuario', 0)
            ->orWhere('permissao_sistema.co_tipo_usuario', 1)
            ->orWhere('permissao_sistema.co_tipo_usuario', 2)
            ->get();
        $cao_usuario = Cao_Usuario::all();
        $permissao_sistema = Permissao_Sistema::all();
        return view(
            'consultor.index',
            compact('cao_usuario', 'permissao_sistema', 'consultor')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function valor(Request $request)
    {
        //$valor = Cao_Fatura::all();

        //return view('consultor.valor', compact('valor'));
        return view('consultor.valor');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function show(consultor $consultor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function edit(consultor $consultor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consultor $consultor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function destroy(consultor $consultor)
    {
        //
    }
}
