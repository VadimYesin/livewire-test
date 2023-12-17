<?php

namespace App\Livewire\UnitOfAnalysis;

use App\Models\UnitOfAnalysis;
use App\Services\UOAService;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public ?UnitOfAnalysis $unit;

    public function mount(?UnitOfAnalysis $unit)
    {
        $this->unit = $unit;
    }

    public function submit(UOAService $service)
    {
        $service->delete($this->unit);

        $this->reset([
            'unit',
        ]);

        $this->dispatch('unitOfAnalysisDeleted');
        $this->dispatch('closeModal', ['unit-of-analysis.delete']);
    }

    public function render()
    {
        return view('livewire.unit-of-analysis.delete');
    }
}
