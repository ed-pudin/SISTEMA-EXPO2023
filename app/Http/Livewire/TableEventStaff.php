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
        $pageSize = 10;

        return view('livewire.table-event-staff', compact('pageSize'));
    }

    public function search(){
        $this->events = event::where('eventName','like', '%'.$this->searchTxt.'%')->get();
    }
}
