<?php

namespace App\Services\Implements;

use App\Models\Catalogue;
use App\Services\Interfaces\CatalogueInterface;
use Illuminate\Http\Request;


class UserImplement implements CatalogueInterface{
    /**
     * @var Catalogue
     */
    private $model;

    /**
     * @var Request
     */
    private $request;
    
    function __construct()
    {
        $this->model = new Catalogue();
        $this->request = new Request();
    }

    /**
     * ingresamos un nuevo Catalogue al La base de datos
     */
    function createCatalogue(array $catalogue){

        $this->model->create($catalogue);
    }

     /**
     * muestra los Catalogue en formato paginacion
     */
    function getCatalogues(string $search){
        
        if($this->request->has('search')){
            return $this->model->query()->where('name', '=', $search)->get();
        } else {
            
            return $this->model->paginate(10);
        }
    }
    
    /**
     * muestra un Catalogue en especifico
     */
    function getCatalogue(int $id){
        
        return $this->model->find($id);
    }

    /**
     * Actualiza los datos de un Catalogue
     */
    function updateCatalogue(array $catalogue, int $id){
        
        $this->model->where('id', $id)->first()->fill($catalogue)->save();
    }

    /**
     * Inabilitia un Catalogue en especifico
     */
    function deleteCatalogue(int $id){

        $catalogue = $this->model->find($id);

        if(!is_null($catalogue)){
           $catalogue->destroy(); 
        }
    }
}