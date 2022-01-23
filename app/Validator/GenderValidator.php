<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenderValidator{

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
            'name' => 'required|unique:gender,name,' .$this->request->id,
        ];
    }

    private function messages(){

        return [];
    }
}