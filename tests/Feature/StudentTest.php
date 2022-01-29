<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{

    public function testStudentBelongToSchool()
    {
    $school   = school::factory()->create();
    $student =  Student::factory()->create(['school_id' => $school->id]);
    $this->assertInstanceOf(School::class, $student->school);
    }
}
