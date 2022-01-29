<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class SchoolTest extends TestCase
{ 
    public function testStoreSchool(){
            School::factory()->count(3)->create();
            $this->assertTrue(true);
    }

    public function testSchoolHasManyStudent()
    {
        $school   = school::factory()->create();
        $student =  Student::factory()->create(['school_id' => $school->id]);
        $this->assertTrue($school->student->contains($student));
        
        $this->assertEquals(1, $school->student->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $school->student);
    }

    public function testIndexReturnsDataInValidFormatApi()
    {
        $this->json('get', 'api/schools')
         ->assertStatus(Response::HTTP_OK)
         ->assertJsonStructure(
             [
                "status" ,
                "message",
                "response" => [
                    "data" => [
                        [
                            'id',
                            'name',
                            'description',
                            'total_students',
                            'enabled'
                        ],
                    ],
                ]
             ]
         );
    }

    public function testSchoolsIsShownCorrectlyApi() {                
        $response = $this->json('GET','api/schools');

        //Write the response in laravel.log
        Log::info(1, [$response->getContent()]);
        $response->assertStatus(200);
        }
}
