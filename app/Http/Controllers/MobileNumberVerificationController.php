<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNumberFormRequest;
use App\Models\User;
use App\Models\UserOtp;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserOtpRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class MobileNumberVerificationController extends Controller
{
    public function index(CountryRepositoryInterface $countryRepository)
    {
        $countries = $countryRepository->getAllCountries();
        return view('mobile-verification.index', ['countries' => $countries]);
    }

    public function verify(PhoneNumberFormRequest $request, UserRepositoryInterface $userRepository, UserOtpRepositoryInterface $userOtpRepository)
    {
        // Sanitize and validate input data
        $validatedData = $request->validated();

        // First, create a new user with the provided phone number and country code
        $userData = [
            'phone_number' => $validatedData['mobile_number'],
            'country_code_id' => $validatedData['country_id']
        ];

        $userId = $userRepository->createUserWithPhoneNumber($userData);

        // Then, save the OTP in the user_otps table
        $userOtpRepository->create($userId, $validatedData['otp_code']);

        // Redirect to the next page 
        return redirect()->route('verify-passport', ['userId' => $userId]);
    }

}