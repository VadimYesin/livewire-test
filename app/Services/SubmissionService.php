<?php

namespace App\Services;

use App\Models\Submissions;
use App\Models\UnitOfAnalysis;

class SubmissionService
{
    public function create(array $data): UnitOfAnalysis
    {
        $new = Submissions::create([
            'uoa_id' => $data['uoaID'],
            'answer' => json_encode($data['answer'], true),
        ]);

        return $new;
    }
}
