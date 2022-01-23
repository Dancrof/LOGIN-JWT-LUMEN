<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implements\GenderImplement;
use App\Validator\GenderValidator;

class GenderController extends Controller
{
    /** 
     * @var GenderImplement  
     */
    private $GenderService;

    /**
     * @var Request  
     */
    private $request;
    
    /**
     * @var GenderValidator
     */
    private $validator;


    public function __construct(GenderImplement $GenderService, Request $request, GenderValidator $genderValidator)
    {
        $this->GenderService = $GenderService;
        $this->request = $request;
        $this->validator = $genderValidator;
    }

    public function postGender(){

        $validator = $this->validator->validate();

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Error',
                'erros' => $validator->errors()
            ], 422);
        }else {
            $this->GenderService->createGender($this->request->all());
        }
        
        return response('Gender Creado Exitosamente', 201);
    }

    public function showGenders(){

        return response($this->GenderService->getGenders(), 200);
    }

    public function showGender(int $id){

        return response($this->GenderService->getGender($id), 200);
    }

    public function clearGender(int $id){

        $this->GenderService->deleteGender($id);

        return response('Gender Eliminado Exitosamente', 200);
    }
}
