<?php

namespace App\Http\Services;

use App\Http\Requests\CandidatoRequest;
use App\Models\Candidato;
use App\Models\Usuario;

class CandidatoService
{

    /**
     * Lista todos os candidatos
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function listAll()
    {
        return Candidato::all()->paginate(15);
    }

    /**
     * Lista o candidato por ID
     * @param int $id
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function findById(int $id)
    {
        return Candidato::find($id);
    }

    /**
     * Cria um novo candidato
     * @param \App\Http\Requests\CandidatoRequest $request 
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function create(CandidatoRequest $request)
    {
        $candidato = Candidato::create($request->all());
        $candidato->usuario()->save(Usuario::find($request->id_usuario));
        return $candidato;
    }

    /**
     * Atualiza um candidato pelo ID
     * @param int $idCandidato
     * @param \App\Http\Requests\CandidatoRequest $request 
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function update(int $candidatoId, CandidatoRequest $request)
    {
        $candidato = Candidato::whereId($candidatoId)->update($request->all());
        $candidato->usuario()->save(Usuario::find($request->id_usuario));
        return $candidato;
    }

    /**
     * Deleta um candidato pelo ID
     * @param int $idCandidato
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function delete(int $idCandidato)
    {
        return Candidato::whereId($idCandidato)->delete();
    }
}
