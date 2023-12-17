<?php

namespace App\Livewire\Submission;

use App\Models\Submissions;
use App\Services\SubmissionService;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public ?Submissions $submission;

    public function mount(?Submissions $submission)
    {
        $this->submission = $submission;
    }

    public function submit(SubmissionService $service)
    {
        $service->delete($this->submission);

        $this->reset([
            'submission',
        ]);

        $this->dispatch('submissionDeleted');
        $this->dispatch('closeModal', ['submission.delete']);
    }

    public function render()
    {
        return view('livewire.submission.delete');
    }
}
