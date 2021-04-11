<?php

namespace App\Traits;

trait ShowDatalTrait{

    public function Success($mesage,$data){

        return[
            'statues' => true,
            'code' => 200,
            'message' => $mesage,
            'data' => $data
            ];
    }

    public function errorValidation($mesage,$error){

        return[
            'statues' => false,
            'code' => 500,
            'message' => $mesage,
            'error' => $error
        ];
    }

    public function SuccesWithMessage($mesage){
        return[
            'statues' => true,
            'code' => 200,
            'message' => $mesage,

        ];
    }
    public function ErrorFind($mesage){
        return[
            'statues' => false,
            'code' => 404,
            'message' => $mesage,

        ];
    }
}

