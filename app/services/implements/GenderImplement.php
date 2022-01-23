<?php

namespace App\Services\Implements;

use App\Models\Gender;
use App\Services\Interfaces\GenderInterface;
use Illuminate\Http\Request;

class GenderImplement implements GenderInterface{
    /**
     * @var Gender
     */
    private $model;

    /**
     * @var Request
     */
    private $request;
    
    function __construct()
    {
        $this->model = new Gender();
        $this->request = new Request();
    }

    /**
     * ingresamos un nuevo gender al La base de datos
     */
    function createGender(array $gender){

        $this->model->create($gender);
    }

     /**
     * muestra los Genders en formato paginacion
     */
    function getGenders(){
          
            return $this->model->paginate(10);
    }
    
    /**
     * muestra un Gender en especifico
     */
    function getGender(int $id){
        
        return $this->model->find($id);
    }

    /**
     * Elimina un Gender en especifico
     */
    function deleteGender(int $id){

        $gender = $this->model->find($id);

        if(!is_null($gender)){
           $gender->delete(); 
        }
    }

}