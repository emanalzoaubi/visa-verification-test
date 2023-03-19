<?php
namespace App\Repositories\Interfaces;

interface CountryRepositoryInterface
{
    public function getCountryById($id);
    public function getAllCountries();
    public function createCountry($data);
    public function updateCountry($data, $id);
    public function deleteCountry($id);
}