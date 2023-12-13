<?php

namespace App\Livewire\UnitOfAnalysis;

use App\Models\UnitOfAnalysis;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class UnitsTable extends Component
{
    protected $listeners = ['unitOfAnalysisAdded' => 'refreshItems'];

    public Collection $units;
    public int $userID;

    public function refreshItems()
    {
        $this->units = UnitOfAnalysis::where('user_id', $this->userID)
            ->with('type')
            ->with('user')
            ->get();
    }

    public function mount()
    {
        $this->userID = auth()->user()?->id;

        $this->units = UnitOfAnalysis::where('user_id', $this->userID)
            ->with('type')
            ->with('user')
            ->get();
    }

    public function render()
    {
        return view('livewire.unit-of-analysis.units-table');
    }
}
