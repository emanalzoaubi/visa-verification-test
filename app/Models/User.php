<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'country_code_id',
        'date_of_birth',
        'gender',
        'place_of_birth',
        'country_of_residency',
        'passport_no',
        'issue_date',
        'expiry_date',
        'place_of_issue',
        'arrival_date',
        'profession',
        'organization',
        'visa_duration',
        'visa_status',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];
    public function placeOfBirth()
    {
        return $this->belongsTo(Country::class, 'place_of_birth');
    }

    public function countryOfResidency()
    {
        return $this->belongsTo(Country::class, 'country_of_residency');
    }

    public function placeOfIssue()
    {
        return $this->belongsTo(Country::class, 'place_of_issue');
    }
}