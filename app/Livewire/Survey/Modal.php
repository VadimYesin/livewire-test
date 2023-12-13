<?php

namespace App\Livewire\Survey;

use App\Models\Submissions;
use App\Models\Survey;
use App\Services\SubmissionService;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    protected $listeners = ['openSurveyModal' => 'openSurveyModalHandler'];

    public ?int $typeID;
    public ?int $uoaID;
    public ?Survey $survey;
    public ?Collection $submissions;
    public $answer = '';

    protected $rules = [
        'answer' => 'required',
    ];

    public function openSurveyModalHandler(?int $typeID = null, ?int $uoaID = null)
    {
        $this->typeID = $typeID;
        $this->uoaID = $uoaID;

        $this->survey = Survey::where('type_id', $this->typeID)->with('questions')->first();
        $this->submissions = Submissions::where('uoa_id', $this->uoaID)->with('unit')->get();

        $this->dispatch('openModal', ['survey.modal'])->self();
    }

    public function submit(SubmissionService $service)
    {
        //$data = $this->validate();
dd($this->validate());
        $service->create($data);

        $this->reset([
            'typeID',
            'uoaID',
            'submissions',
            'survey'
        ]);

        $this->dispatch('closeModal', ['survey.modal'])->self();
    }

    public function render()
    {
        return view('livewire.survey.modal');
    }
}
