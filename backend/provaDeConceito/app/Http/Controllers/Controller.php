<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public const SAVEERROR = 'Não foi possível salvar o registro';
    public const SAVESUCCESS   = "Registro salvo com sucesso.";
    public const UPDATESUCCESS = 'Registro atualizado com sucesso.';
    public const ERRORUPDATE   = 'Erro ao tentar atualizar o registro.';
    public const LISTSUCCESS = 'Registros Localizados';
    public const NOTFOUND = 'Nem um Registro encontrado!';
    public const ERRORDELETE = "Não foi possivél deletar o registros.";

    public function successSave($registro, $sucessMessage = self::SAVESUCCESS, $erroMessage = self::SAVEERROR)
    {
        if ($registro) {
            return $this->successResponse($sucessMessage, $registro);
        }
        return $this->errorResponse($erroMessage, '');
    }

    public function successList($registro)
    {
        if ($registro) {
            return $this->successResponse(self::LISTSUCCESS, $registro);
        }
        return $this->errorResponse(self::NOTFOUND, '');
    }

    public function successResponse($menssage, $data = null, $codigo = 200)
    {
        if (!is_array($menssage)) {
            $msg = [
                'success' => [
                    $menssage
                ]
            ];
        } else {
            if (isset($menssage['success'])) {
                $msg = $menssage;
            } else {
                $msg = [
                    'success' => [
                        $menssage
                    ]
                ];
            }
        }

        $response = [
            'success' => true,
            'menssage' => $msg,
            'data' => $data,
        ];

        return response()->json($response, $codigo);
    }

    public function errorResponse($error, $data = [], $codigo = 400)
    {
        $response = [
            'success' => false,
            'menssage' => $error
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $codigo);
    }
}
