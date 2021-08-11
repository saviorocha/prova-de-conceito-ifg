<?php

namespace App\Http\Controllers\Api\Administracao\Cadastro\Candidato;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatoRequest;
use App\Models\Candidato;
use App\Services\CandidatoService;

class CandidatoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successList(
            (new CandidatoService)->listAll()
        );
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $this->successList(
            (new CandidatoService)->findById($id)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoRequest $request)
    {
        return $this->successSave(
            (new CandidatoService)->create($request)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidatoRequest $request, int $id)
    {
        return $this->successSave(
            (new CandidatoService)->update($id, $request)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return $this->successResponse(
            'Registro excluído com sucesso',
            (new CandidatoService)->delete($id)
        );
    }
}
