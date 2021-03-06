<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class ClientValidation
{
    protected static $rulesInsertClient = [
        'cpfCnpj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo cpfCnpj é obrigatório.'
            ]
        ],
        'razaoSocial' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo razaoSocial é obrigatório.'
            ]
        ],
        'tipo' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo tipo é obrigatório.'
            ]
        ],
        'cep' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo cep é obrigatório.'
            ]
        ],
        'uf' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo uf é obrigatório.'
            ]
        ],
        'cidade' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo cidade é obrigatório.'
            ]
        ],
        'bairro' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo bairro é obrigatório.'
            ]
        ],
        'logradouro' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo logradouro é obrigatório.'
            ]
        ],
        'telefone1' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo telefone1 é obrigatório.'
            ]
        ],
    ];

    protected static $rulesUpdateClient = [
        'idUpdate' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo idUpdate e obrigatorio'
            ]
        ],
        'updateRazaoSocial' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateRazaoSocial e obrigatorio'
            ]
        ],
        'updateCep' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateCep e obrigatorio'
            ]
        ],
        'updateUf' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateUf e obrigatorio'
            ]
        ],
        'updateCidade' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateCidade e obrigatorio'
            ]
        ],
        'updateBairro' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateBairro e obrigatorio'
            ]
        ],
        'updateLogradouro' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateLogradouro e obrigatorio'
            ]
        ],
        'updateTelefone1' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo updateTelefone1 e obrigatorio'
            ]
        ],
    ];

    public static function validateInsert(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesInsertClient);
        $valid = null;

        if (!$validation->withRequest($request)->run()) {

            $valid = [
                'code'    => Response::HTTP_BAD_REQUEST,
                'message' => self::treatValidationErrors(),
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
        return $valid;
    }

    public static function validateUpdate(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesUpdateClient);
        $valid = null;

        if (!$validation->withRequest($request)->run()) {

            $valid = [
                'code'    => Response::HTTP_BAD_REQUEST,
                'message' => self::treatValidationErrors(),
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
        return $valid;
    }

    public static function treatValidationErrors(): string
    {
        return implode(" ", array_values(\Config\Services::validation()->getErrors()));
    }
}
