<?php

namespace App\Services\Interfaces;

interface GenderInterface {

    /** 
     * @param array $gender
     * @return void
     */
    function createGender(array $gender);

    /** 
     * @return Genders
     */
    function getGenders();

    /** 
     * @param int $id
     * @return Gender
     */
    function getGender(int $id);

    /** 
     * @param int $id
     * @return void
     */
    function deleteGender(int $id);
}