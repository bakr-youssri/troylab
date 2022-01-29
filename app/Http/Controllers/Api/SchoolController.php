<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BaseCrudRepositoryInterface;
use App\Http\Requests\SchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use App\Models\Student;
use App\Traits\CoreJsonTrait;
use Throwable;

class SchoolController extends Controller
{
    use CoreJsonTrait;
    
    protected $school;
    public function __construct(BaseCrudRepositoryInterface $school)
    {
        $this->school = $school;
    }
    
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return $this->ok(SchoolResource::collection($schools)->resolve());
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        try{
            $school = $this->school->store($request->validated());
            return $this->ok([new SchoolResource($school)], null, __('translate.general.success_create'));
        }catch(Throwable $e){
            return $this->invalidRequest([$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return $this->ok([new SchoolResource($school)]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, School $school)
    {
        try{
            $school_update = $this->school->update($request->validated(), $school);
            return $this->ok([new SchoolResource($school_update)], null, __('translate.general.success_update'));
        }catch(Throwable $e){
            return $this->invalidRequest([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        try{
            if(Student::where('school_id', $school->id)->count() > 0){
                return $this->invalidRequest([__('translate.general.error_delete')]);
            }
            $school->delete();
            return $this->ok(null, null, __('translate.general.success_delete')); 
        }catch(Throwable $e){
            return $this->invalidRequest([$e->getMessage()]);
        }
    }
}
