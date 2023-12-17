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

    public function update(UnitOfAnalysis $unit, array $data): void
    {
        $unit->update([
            'user_id' => $data['userID'],
            'type_id' => $data['typeID'],
            'title' => $data['title'],
        ]);
    }

    public function delete(UnitOfAnalysis $unit): void
    {
        $unit->delete();
    }
}
