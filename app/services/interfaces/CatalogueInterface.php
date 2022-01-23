<?php

namespace App\Services\Interfaces;

interface CatalogueInterface {

    /** 
     * @param array $catalogue
     * @return void
     */
    function createCatalogue(array $catalogue);

    /** 
     * @return Catalogues
     */
    function getCatalogues(string $search);

    /** 
     * @param int $id
     * @return Catalogue
     */
    function getCatalogue(int $id);

    /** 
     * @param array $catalogue
     * @param int $id 
     * @return void
     */
    function updateCatalogue(array $catalogue, int $id);

    /** 
     * @param int $id
     * @return void
     */
    function deleteCatalogue(int $id);    
}