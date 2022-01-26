<?php

namespace App\Http\Controllers;

use App\Repositories\BaseCrudRepositoryInterface;
use App\Http\Requests\StudentRequest;
use App\Models\School;
use App\Models\Student;
use Facade\FlareClient\Http\Response;
use Throwable;

class StudentController extends Controller
{
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
        return view('Students.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('Students.store', compact('schools'));
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
            $this->student->store($request->validated());
            toastr()->success(__('translate.general.success_create'));
            return redirect('/students');
        }catch(Throwable $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
        return view('Students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $schools = School::all();
        return view('Students.edit', compact('student', 'schools'));
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
            $this->student->update($request->validated(), $student);
            toastr()->success(__('translate.general.success_update'));
            return redirect('/students');
        }catch(Throwable $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
            return Response()->json(['status'=>'success','message'=>__('translate.general.success_deleta')]);
        }catch(Throwable $e){
            return Response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
