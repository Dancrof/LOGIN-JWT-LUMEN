<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterValidator{

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
            'url_chapter' => 'required|unique:chapter,url_chapter,' .$this->request->id,
            'calalogue_fk' => 'required' 
        ];
    }

    private function messages(){

        return [];
    }
}