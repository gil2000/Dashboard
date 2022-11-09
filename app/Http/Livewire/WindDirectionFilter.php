<?php

namespace App\Http\Livewire;

use App\Models\Station;
use Livewire\Component;
use App\Models\WindDirection;
use Livewire\WithPagination;


class WindDirectionFilter extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $station;
    public $from;
    public $to;


    public function render()
    {
        return view('livewire.wind-direction')->with([
            'winddirections' => WindDirection::search($this->from, $this->to, $this->station)
                ->orderBy('created_at', 'desc')
                ->paginate(10),
            'stations' => Station::all()
        ]);
    }



}
