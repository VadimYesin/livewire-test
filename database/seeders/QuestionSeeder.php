<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add students questions
        $studentSurvey = Survey::whereHas('type', function (Builder $query) {
            $query->where('name', '=', 'Students');
        })->first();

        DB::table('questions')->insert([
            'survey_id' => $studentSurvey->id,
            'title' => 'Year of Admission',
            'type' => Question::INPUT_NUMBER_TYPE,
            'options' => null,
        ]);
        DB::table('questions')->insert([
            'survey_id' => $studentSurvey->id,
            'title' => 'AVERAGE SCORE',
            'type' => Question::INPUT_DROPDOWN_TYPE,
            'options' => json_encode([
                '60-74',
                '75-89',
                '90-100'
            ]),
        ]);

        // Add students questions
        $teachersSurvey = Survey::whereHas('type', function (Builder $query) {
            $query->where('name', '=', 'Teachers');
        })->first();

        DB::table('questions')->insert([
            'survey_id' => $teachersSurvey->id,
            'title' => 'Degree',
            'type' => Question::INPUT_TEXT_TYPE,
            'options' => null,
        ]);
        DB::table('questions')->insert([
            'survey_id' => $teachersSurvey->id,
            'title' => 'Lessons',
            'type' => Question::INPUT_CHECKBOX_TYPE,
            'options' => json_encode([
                'Math',
                'Literature',
                'Philosophy'
            ]),
        ]);
    }
}
