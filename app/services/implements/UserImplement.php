<?php

namespace App\Services\Implements;

use App\Models\User;
use App\Services\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserImplement implements UserInterface{
    /**
     * @var User
     */
    private $model;

    /**
     * @var Request
     */
    private $request;
    
    function __construct()
    {
        $this->model = new User();
        $this->request = new Request();
    }

    /**
     * ingresamos un nuevo user al La base de datos
     */
    function createUser(array $user){

        $user['password'] = Hash::make($user['password']);
        $this->model->create($user);
    }

     /**
     * muestra los user en formato paginacion
     */
    function getUsers(){
        
        if($this->request->has('search')){
            return $this->model->query()->where('username', '=', $this->request->get('search'))
                        ->orWhere('email', 'like', '%' .$this->request->get('search') .'%')->get();
        } else {
            
            return $this->model->withTrashed()->paginate(10);
        }
    }
    
    /**
     * muestra un user en especifico
     */
    function getUser(int $id){
        
        return $this->model->find($id);
    }

    /**
     * Actualiza los datos de un user
     */
    function updateUser(array $user, int $id){
        
        $user['password'] = Hash::make($user['password']);
        $this->model->where('id', $id)->first()->fill($user)->save();
    }

    /**
     * Inabilitia un user en especifico
     */
    function deleteUser(int $id){

        $user = $this->model->find($id);

        if(!is_null($user)){
           $user->delete(); 
        }
    }

    /**
     * abilita un user en especifico
     */
    function restoreUser(int $id){

        $user = $this->model->withTrashed()->find($id);

        if(!is_null($user)){
            $user->restore();
        }
    } 
}