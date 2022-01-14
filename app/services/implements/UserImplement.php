<?php

namespace App\Services\Implements;

use App\Models\User;
use App\Services\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UserImplement implements UserInterface{

    private $model;
    
    function __construct()
    {
        $this->model = new User();
    }

    /**
     * ingresamos un nuevo user al La base de datos
     */
    function createUser(array $user){

        $user['password'] = Hash::make($user['password']);
        $this->model->create($user);
    }

    function getUsers(){
        
        return $this->model->withTrashed()->paginate(10);
    }
 
    function getUser(int $id){

    }

    function updateUser(array $user, int $id){
        
        $user['password'] = Hash::make($user['password']);
        $this->model->where('id', $id)->first()->fill($user)->save();
    }

    function deleteUser(int $id){

        $user = $this->model->find($id);

        if(!is_null($user)){
           $user->delete(); 
        }
    }

    function restoreUser(int $id){

        $user = $this->model->withTrashed()->find($id);

        if(!is_null($user)){
            $user->restore();
        }
    } 
}