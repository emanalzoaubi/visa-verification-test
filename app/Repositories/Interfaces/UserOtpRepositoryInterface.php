<?php

namespace App\Repositories\Interfaces;

interface UserOtpRepositoryInterface
{
    public function create(int $userId, string $otpCode): void;

}