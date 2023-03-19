<?php

namespace App\Repositories;

use App\Models\UserCompanion;
use App\Repositories\Interfaces\UserCompanionRepositoryInterface;

class UserCompanionRepository implements UserCompanionRepositoryInterface
{
    public function create($userId, $comanionId): void
    {
        $userCompanion = new UserCompanion;
        $userCompanion->user_id = $userId;
        $userCompanion->companion_id = $comanionId;
        $userCompanion->save();
    }
}