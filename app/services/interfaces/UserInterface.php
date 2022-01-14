<?php

namespace App\Services\Interfaces;

interface UserInterface {

    /** 
     * @param array $user
     * @return void
     */
    function createUser(array $user);

    /** 
     * @return Users
     */
    function getUsers();

    /** 
     * @param int $id
     * @return User
     */
    function getUser(int $id);

    /** 
     * @param array $user
     * @param int $id 
     * @return void
     */
    function updateUser(array $user, int $id);

    /** 
     * @param int $id
     * @return boolean
     */
    function deleteUser(int $id);

    /** 
     * @param int $id
     * @return boolean
     */
    function restoreUser(int $id);    
}