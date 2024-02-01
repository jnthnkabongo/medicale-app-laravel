<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PatientForm extends Component
{
    public $code;
    public function render()
    {
        $this->code = Str::random(7);
        return view('livewire.patient-form');
    }
}
