<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\event;

class TableEventStaff extends Component
{
    public $events;
    public $searchTxt = "";

    public function render()
    {
        return view('livewire.table-event-staff');
    }

    public function search(){
        $this->events = event::where('eventName','like', '%'.$this->searchTxt.'%')->get();
    }
}
