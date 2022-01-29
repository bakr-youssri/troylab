<?php

namespace App\Http\Controllers\Api;

use App\Repositories\BaseCrudRepositoryInterface;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StudentRequest;
use App\Http\Controllers\Controller;
use App\Traits\CoreJsonTrait;
use App\Models\Student;
use Throwable;

class StudentController extends Controller
{
    use CoreJsonTrait;

    protected $student;
    public function __construct(BaseCrudRepositoryInterface $student)
    {
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $students = Student::all();
        return $this->ok(StudentResource::collection($students)->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try{
            $student = $this->student->store($request->validated());
            return $this->ok([new StudentResource($student)], null, __('translate.general.success_create'));
        }catch(Throwable $e){
            return $this->invalidRequest([$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $this->ok([new StudentResource($student)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        try{
            $student_update = $this->student->update($request->validated(), $student);
            return $this->ok([new StudentResource($student_update)], null, __('translate.general.success_update'));
        }catch(Throwable $e){
            return $this->invalidRequest([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try{
            $student->delete();
            return $this->ok(null, null, __('translate.general.success_delete')); 
        }catch(Throwable $e){
            return $this->invalidRequest([$e->getMessage()]);
        }
    }
}
