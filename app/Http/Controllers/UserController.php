<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implements\UserImplement;
use App\Validator\UserValidator;

class UserController extends Controller
{
    /** 
     * @var UserImplement  
     */
    private $userService;

    /** 
     * @var Request  
     */
    private $request;
    
    /**
     * @var UserValidator
     */
    private $validator;


    public function __construct(UserImplement $userService, Request $request, UserValidator $userValidator)
    {
        $this->userService = $userService;
        $this->request = $request;
        $this->validator = $userValidator;
    }

    public function postUser(){

        $validator = $this->validator->validate();

        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Error',
                'erros' => $validator->errors()
            ], 422);
        }else {
            $this->userService->createUser($this->request->all());
        }
        
        return response('User Creado Exitosamente', 201);
    }

    public function showUsers(){

        return response($this->userService->getUsers(), 200);
    }

    public function upUser(int $id){

        $this->userService->updateUser($this->request->all(), $id);
        
        return response('User Actilizado Exitosamente', 202);
    }

    public function disableUser(int $id){

        $this->userService->deleteUser($id);

        return response('User inabilitado Exitosamente', 200);
    }

    public function enableUSer(int $id){

        $this->userService->restoreUser($id);

        return response('User Habilitado Exitosamente', 200);
    }
}
