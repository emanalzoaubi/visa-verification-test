<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::latest()->paginate(10);
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function createUserWithPhoneNumber($data)
    {
        $user = new User();
        $user->phone_number = $data['phone_number'];
        $user->country_code_id = $data['country_code_id'];
        $user->save();
        return $user->id;
    }
    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser($data, $id)
    {
        return User::whereId($id)->update($data);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
    }
}