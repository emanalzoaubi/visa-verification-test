<?php

namespace App\Repositories;

use App\Models\UserOtp;
use App\Repositories\Interfaces\UserOtpRepositoryInterface;

class UserOtpRepository implements UserOtpRepositoryInterface
{
    public function create(int $userId, string $otpCode): void
    {
        $userOtp = new UserOtp;
        $userOtp->user_id = $userId;
        $userOtp->otp_code = $otpCode;
        $userOtp->save();
    }
}