<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogueValidator{

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
            
            'url_portada' => 'required',
            'name' => 'required|unique:catalogue,name,' .$this->request->id,
            'gender_fk' => 'required'
        ];
    }

    private function messages(){

        return [];
    }
}