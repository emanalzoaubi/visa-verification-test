<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{
    public function getAllCountries()
    {
        return Country::orderBy('name', 'asc')->get();
    }

    public function createCountry($data)
    {
        return Country::create($data);
    }
    public function getCountryById($id)
    {
        return Country::findOrFail($id);
    }
    public function updateCountry($data, $id)
    {
        return Country::whereId($id)->update($data);
    }
    public function deleteCountry($id)
    {
        Country::destroy($id);
    }
}