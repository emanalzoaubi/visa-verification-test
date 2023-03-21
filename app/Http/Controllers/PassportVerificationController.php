<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisaFormRequest;
use App\Models\VisaDocument;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\UserCompanionRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VisaDocumentRepositoryInterface;
use Storage;


class PassportVerificationController extends Controller
{
    private const VISA_DURATION_OPTIONS_COUNT = 90;
    private UserRepositoryInterface $userRepository;
    private UserCompanionRepositoryInterface $userCompanionRepository;
    private VisaDocumentRepositoryInterface $visaDocumentRepository;
    public function __construct(UserRepositoryInterface $userRepository, UserCompanionRepositoryInterface $userCompanionRepository, VisaDocumentRepositoryInterface $visaDocumentRepository)
    {
        $this->userRepository = $userRepository;
        $this->userCompanionRepository = $userCompanionRepository;
        $this->visaDocumentRepository = $visaDocumentRepository;
    }
    public function index(CountryRepositoryInterface $countryRepository, $userId)
    {
        $countries = $countryRepository->getAllCountries();
        return view('passport-verification.index', [
            'countries' => $countries,
            'visaDurationOptions' => $this->prepareVisaDurationOptions(),
            'userId' => $userId
        ]);
    }
    public function store(VisaFormRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $userId = $validatedData['user_id'];

            $userData = collect($validatedData)->only(['first_name', 'last_name', 'date_of_birth', 'gender', 'place_of_birth', 'country_of_residency', 'passport_no', 'issue_date', 'expiry_date', 'place_of_issue', 'arrival_date', 'profession', 'organization', 'visa_duration', 'visa_status'])->toArray();

            $this->userRepository->updateUser($userData, $userId);

            $this->storeVisaDocument($userId, 'personal_picture', $validatedData['personal_picture']);
            $this->storeVisaDocument($userId, 'passport_picture', $validatedData['passport_picture']);

            $userPassportPicture = $validatedData['passport_picture']->store('public');
            $url = Storage::url($userPassportPicture);
            $this->visaDocumentRepository->create($userId, $url, "passport_picture");

            if ($validatedData['traveling_with_companion'] === 'yes') {

                $companionData = collect($validatedData)->only(['companion_first_name', 'companion_last_name', 'companion_date_of_birth', 'companion_gender', 'companion_place_of_birth', 'companion_country_of_residency', 'companion_passport_no', 'companion_issue_date', 'companion_expiry_date', 'companion_place_of_issue', 'companion_arrival_date', 'companion_profession', 'companion_organization', 'companion_visa_duration', 'companion_visa_status', 'companion_passport_picture', 'companion_personal_picture'])->toArray();
                $companionData = $this->prepareComapionData($companionData);

                $companionUser = $this->userRepository->createUser($companionData);

                $this->userCompanionRepository->create($userId, $companionUser->id);

                $this->storeVisaDocument($companionUser->id, 'personal_picture', $validatedData['personal_picture']);
                $this->storeVisaDocument($companionUser->id, 'passport_picture', $validatedData['passport_picture']);
            }

            return redirect()->back()->with('success', 'Data entered successfully!');
        } catch (\Exception $e) {
            \Log::debug($e->getMessage());
        }
    }

    private function prepareVisaDurationOptions(): array
    {
        $options = [];
        for ($i = 1; $i <= self::VISA_DURATION_OPTIONS_COUNT; $i++) {
            $options[] = [
                'id' => sprintf('%02d', $i),
                'name' => $i . ' Day' . ($i > 1 ? 's' : ''),
            ];
        }
        return $options;
    }

    private function prepareComapionData($companionData)
    {
        $newData = [];

        foreach ($companionData as $key => $value) {
            if (strpos($key, 'companion_') === 0) {
                $newKey = substr($key, strlen('companion_'));
                $newData[$newKey] = $value;
            } else {
                $newData[$key] = $value;
            }
        }

        return $newData;
    }

    private function storeVisaDocument(int $userId, string $documentType, $document)
    {
        $url = Storage::url($document->store('public'));
        $this->visaDocumentRepository->create($userId, $url, $documentType);
    }
}
