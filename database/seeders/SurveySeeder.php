<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = Type::all();

        foreach ($types as $type) {
            DB::table('surveys')->insert([
                'type_id' => $type->id
            ]);
        }
    }
}
