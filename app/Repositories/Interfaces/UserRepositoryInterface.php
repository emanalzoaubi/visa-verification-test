<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getUserById($id);
    public function getAllUsers();
    public function createUser($data);
    public function createUserWithPhoneNumber($data);
    public function updateUser($data, $id);
    public function deleteUser($id);
}