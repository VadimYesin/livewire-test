<?php

namespace App\Services;

use App\Models\UnitOfAnalysis;

class UOAService
{
    public function create(array $data): UnitOfAnalysis
    {
        $uoa = UnitOfAnalysis::create([
            'user_id' => $data['userID'],
            'type_id' => $data['typeID'],
            'title' => $data['title'],
        ]);

        return $uoa;
    }
}
