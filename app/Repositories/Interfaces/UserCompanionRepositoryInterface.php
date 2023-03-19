<?php

namespace App\Repositories\Interfaces;

interface UserCompanionRepositoryInterface
{
    public function create($userId, $comanionId);
}