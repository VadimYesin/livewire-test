<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Submissions;
use App\Models\UnitOfAnalysis;

class SubmissionService
{
    public function create(UnitOfAnalysis $unit, array $data): Submissions
    {
        return Submissions::create([
            'uoa_id' => $unit->id,
            'answer' => $this->formatAnswersWithQuestions($data['answer']),
        ]);
    }

    public function delete(Submissions $submission): void
    {
        $submission->delete();
    }

    private function formatAnswersWithQuestions(array $answers): string
    {
        $questions = Question::whereIn('id', array_keys($answers))->get();

        $result = [];

        foreach ($questions as $question) {
            $result[strtolower($question->title)] = is_array($answers[$question->id]) ? array_keys($answers[$question->id]) : $answers[$question->id];
        }

        return json_encode($result, true);
    }
}
