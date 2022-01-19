<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthValidator{

    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function validate(){

        return Validator::make($this->request->all(), $this->rules(), $this->messages());     
    }

    private function rules(){

        return [

            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
    }

    private function messages(){

        return [];
    }
}