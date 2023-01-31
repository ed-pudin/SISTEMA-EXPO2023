<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\company;

class TableCompanyStaff extends Component
{
    public $companies;
    public $searchTxt = "";

    public function render()
    {
        return view('livewire.table-company-staff');
    }

    public function search(){
        $this->companies = company::where('nameCompany','like', '%'.$this->searchTxt.'%')->get();
    }
}
