<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VisaForm extends Component
{
    public $countries;

    public $visaDurationOptions;
    public function __construct($countries)
    {
        $this->countries = $countries;
    }

    public function render()
    {
        return view('components.visa-form', [
            'countries' => $this->countries,
            'visaDurationOptions' => $this->visaDurationOptions,
        ]);
    }
}