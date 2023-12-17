<?php

namespace App\Livewire\UnitOfAnalysis;

use App\Models\Type;
use App\Models\UnitOfAnalysis;
use App\Services\UOAService;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public Collection $types;
    public UnitOfAnalysis $unit;
    public string $title;
    public int $userID;
    public int $typeID;

    protected $rules = [
        'typeID' => 'required|exists:types,id',
        'title' => 'required',
        'userID' => 'required|exists:users,id',
    ];

    public function mount(UnitOfAnalysis $unit)
    {
        $this->unit = $unit;
        $this->userID = auth()->user()?->id;
        $this->types = Type::all();
        $this->title = $this->unit->title;
        $this->typeID = $this->unit->type->id;
    }

    public function submit(UOAService $service)
    {
        $data = $this->validate();

        $service->update($this->unit, $data);

        $this->reset([
            'typeID',
            'title',
            'userID',
            'unit'
        ]);

        $this->dispatch('unitOfAnalysisEdited');
        $this->dispatch('closeModal', ['unit-of-analysis.edit']);
    }

    public function render()
    {
        return view('livewire.unit-of-analysis.edit');
    }
}
