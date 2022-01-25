<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!School::first() && !Student::first()){
            //$school = School::factory(3)->has(Student::factory()->count(1000))->create();

            $this->command->getOutput()->progressStart(1000);
            School::factory(3)->has(Student::factory()->count(1000))->create();
            $this->command->getOutput()->progressAdvance();
            $this->command->getOutput()->progressFinish();
        }
    }
}
