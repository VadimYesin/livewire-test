<?php

namespace App\Livewire\Submission;

use App\Models\Submissions;
use App\Models\Survey;
use App\Models\Type;
use App\Models\UnitOfAnalysis;
use App\Services\SubmissionService;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public ?Type $type = null;
    public ?UnitOfAnalysis $unit = null;
    public ?Survey $survey;
    public ?Collection $submissions = null;
    public $answer = [];

    protected $rules = [
        'answer.*' => 'required',
    ];

    public function mount(?Type $type, ?UnitOfAnalysis $unit)
    {
        $this->type = $type;
        $this->unit = $unit;
        $this->survey = Survey::where('type_id', $this->type->id)->with('questions')->first();
        $this->submissions = Submissions::where('uoa_id', $this->unit->id)->with('unit')->get();
    }

    public function submit(SubmissionService $service)
    {
        $data = $this->validate();

        $service->update($this->unit, $data);

        $this->reset([
            'type',
            'unit',
            'submissions',
            'survey',
            'answer',
        ]);

        $this->dispatch('closeModal', ['submission.edit'])->self();
    }

    public function render()
    {
        return view('livewire.submission.edit');
    }
}
