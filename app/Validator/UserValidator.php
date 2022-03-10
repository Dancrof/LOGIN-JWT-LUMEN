<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator{

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

            'name' => 'required',
            'username' => 'required|unique:user,username,' .$this->request->id,
            'email' => 'required|email|unique:user,email,' .$this->request->id,
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ];
    }

    private function messages(){

        return [];
    }
}