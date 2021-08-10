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
        $candidatos = (new CandidatoService)->listAll();
        if (!$candidatos) {
            return $this->errorResponse('Candidatos não encontrados');
        }
        return $this->successList($candidatos);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $candidato = (new CandidatoService)->findById($id);
        if (!$candidato) {
            return $this->errorResponse('Candidato não encontrado');
        }
        return $this->successResponse($candidato);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoRequest $request)
    {
        $candidato = (new CandidatoService)->create($request);
        if (!$candidato) {
            return $this->errorResponse('Erro ao cadastrar o candidato');
        }
        return $this->successSave($candidato);
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
        $candidato = (new CandidatoService)->update($id, $request);
        if (!$candidato) {
            return $this->errorResponse('Erro ao atualizar o candidato');
        }
        return $this->successResponse('Registro atualizado com sucesso', $candidato);
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
