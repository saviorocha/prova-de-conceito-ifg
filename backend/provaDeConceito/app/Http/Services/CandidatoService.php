<?php

namespace App\Services;

use App\Http\Requests\CandidatoRequest;
use App\Http\Requests\Formulario\Administracao\Cadastro\Usuario\UsuarioRequest;
use App\Jobs\Cadastro\Usuario\SendEmailCadastroServidorJob;
use App\Models\Cadastro\Usuario\Usuario;
use App\Models\Cadastro\Usuario\UsuarioEndereco;
use App\Models\Candidato;
use App\Services\Auth\GerarSenhaTemporaria;
use App\Services\Helper\Message\BaseResponseMessage;

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
     * @param int $idCandidato
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function findById(int $idCandidato)
    {
        return Candidato::find($idCandidato);
    }

    /**
     * Cria um novo candidato
     * @param \App\Http\Requests\CandidatoRequest $request 
     * @return \App\Models\Candidato
     * @author Sávio de Melo
     */
    public function create(CandidatoRequest $request)
    {
        return Candidato::create($request->all());
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
        return Candidato::whereId($candidatoId)->update($request->all());
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
