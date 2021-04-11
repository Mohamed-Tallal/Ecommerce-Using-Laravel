<?php

namespace App\Traits;

trait loginTrait{

    public function Success($mesage,$data,$token){

        return[
            'statues' => true,
            'code' => 200,
            'message' => $mesage,
            'token' => $token,
            'userInfo' => $data
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
    public function ErrorFind($mesage,$error){
        return[
            'statues' => false,
            'code' => 501,
            'message' => $mesage,
            'error' => $error

        ];
    }
    public function Error($mesage){
        return[
            'statues' => false,
            'code' => 501,
            'message' => $mesage,

        ];
    }

    public function meTrait($mesage,$data){
        return[
            'statues' => true,
            'code' => 200,
            'message' => $mesage,
            'me' => $data

        ];
    }
}

