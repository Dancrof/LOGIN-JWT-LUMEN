<?php

namespace App\Services\Implements;

use App\Models\Chapter;
use App\Services\Interfaces\ChapterInterface;
use Illuminate\Http\Request;

class ChapterImplement implements ChapterInterface{
    /**
     * @var Chapter
     */
    private $model;

    /**
     * @var Request
     */
    private $request;
    
    function __construct()
    {
        $this->model = new Chapter();
        $this->request = new Request();
    }

    /**
     * ingresamos un nuevo Chapter al La base de datos
     */
    function createChapter(array $chapter){

        $this->model->create($chapter);
    }

     /**
     * muestra los Chapter en formato paginacion
     */
    function getChapters(string $search){
          
        return $this->model->paginate(10);
    }
    
    /**
     * muestra un Chapter en especifico
     */
    function getChapter(int $id){
        
        return $this->model->find($id);
    }

    /**
     * Actualiza los datos de un Chapter
     */
    function updateChapter(array $chapter, int $id){
        
        $this->model->where('id', $id)->first()->fill($chapter)->save();
    }

    /**
     * Inabilitia un Chapter en especifico
     */
    function deleteChapter(int $id){

        $chapter = $this->model->find($id);

        if(!is_null($chapter)){
           $chapter->destroy(); 
        }
    }
}