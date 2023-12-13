<?php

namespace App\Livewire\UnitOfAnalysis;

use App\Models\Type;
use App\Services\UOAService;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class CreateModal extends ModalComponent
{
    public int $typeID;
    public Collection $types;
    public string $title;
    public int $userID;

    protected $rules = [
        'typeID' => 'required|exists:types,id',
        'title' => 'required',
        'userID' => 'required|exists:users,id',
    ];

    public function mount()
    {
        $this->userID = auth()->user()?->id;
        $this->types = Type::all();
    }

    public function submit(UOAService $service)
    {
        $data = $this->validate();

        $service->create($data);

        $this->reset([
            'typeID',
            'title',
            'userID'
        ]);

        $this->dispatch('unitOfAnalysisAdded');
        $this->dispatch('closeModal', ['unit-of-analysis.create-modal']);
    }

    public function render()
    {
        return view('livewire.unit-of-analysis.create-modal');
    }
}
