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
            $this->command->getOutput()->progressStart(3);
            School::factory(3)->create()->each(function($q){
                Student::factory(1000)->create([
                'school_id' => $q->id
                ]);
                $this->command->getOutput()->progressAdvance();
            });
           $this->command->getOutput()->progressFinish();
       }
    }
}
