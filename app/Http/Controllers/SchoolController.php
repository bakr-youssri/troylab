<?php

namespace App\Http\Controllers;

use App\Repositories\BaseCrudRepositoryInterface;
use App\Http\Requests\SchoolRequest;
use App\Models\School;
use App\Models\Student;
use Throwable;

class SchoolController extends Controller
{
    protected $school;
    public function __construct(BaseCrudRepositoryInterface $school)
    {
        $this->school = $school;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return view('schools.list', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Schools.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        try{
            $this->school->store($request->validated());
            toastr()->success(__('translate.general.success_create'));
            return redirect('/schools');
        }catch(Throwable $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('Schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('Schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, School $school)
    {
        try{
            $this->school->update($request->validated(), $school);
            toastr()->success(__('translate.general.success_update'));
            return redirect('/schools');
        }catch(Throwable $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        try{
            if(Student::where('school_id', $school->id)->count() > 0){
                return Response()->json(['status'=>'error','message'=>__('translate.general.error_delete')]);
            }
            $school->delete();
            return Response()->json(['status'=>'success','message'=>__('translate.general.success_delete')]);
        }catch(Throwable $e){
            return Response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
