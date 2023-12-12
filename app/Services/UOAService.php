<?php

namespace App\Services;

use App\Models\UnitOfAnalysis;

class UOAService
{
    public function create(array $data): UnitOfAnalysis
    {
        $uoa = UnitOfAnalysis::create([
            'user_id' => $data['user_id'],
            'type_id' => $data['type_id'],
            'title' => $data['title'],
        ]);

        return $uoa;
    }
}
