@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    {{__('translate.students.edit_student')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__("translate.students.edit_student")}}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item"><a href="/">{{__("translate.general.main")}}</a></li>
                    <li class="breadcrumb-item"><a href="{{Route('students.index')}}">{{__("translate.students.students")}}</a></li>
                    <li class="breadcrumb-item active">{{__("translate.students.edit_student")}}</li>
                </ol>
            </nav>						
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{Route('students.update', $student->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.name')}}</label>
                                <input type="text" class="form-control" id="inputName" name="name" value="{{$student->name}}" required>
                            </div>

                            <div class="col">
                                <label>{{__('translate.general.email')}}</label>
                                <input class="form-control" name="email" id="inputName" type="text" value="{{$student->email}}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.phone')}}</label>
                                <input type="text" class="form-control" id="inputName" name="mob" value="{{$student->mob}}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.schools.schools')}}</label>
                                <select class="form-control select2" name="school_id">
                                    <option value="{{$student->school->id}}">{{$student->school->name}}</option>
                                    @foreach ($schools as $school)
                                    @if ($student->school->id !== $school->id)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.gender')}}</label>
                                <select class="form-control select2" name="gender">
                                    @if ($student->gender == 'male')
                                    <option value="male">{{__('translate.general.male')}}</option>
                                    <option value="female">{{__('translate.general.female')}}</option>
                                    @else
                                    <option value="female">{{__('translate.general.female')}}</option>
                                    <option value="male">{{__('translate.general.male')}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.level')}}</label>
                                <select class="form-control select2" name="level">
                                    @if($student->level == 'one')
                                    <option value="one">{{__('translate.general.one')}}</option>
                                    <option value="two">{{__('translate.general.two')}}</option>
                                    <option value="three">{{__('translate.general.three')}}</option>
                                    @elseif($student->level == 'two')
                                    <option value="two">{{__('translate.general.two')}}</option>
                                    <option value="one">{{__('translate.general.one')}}</option>
                                    <option value="three">{{__('translate.general.three')}}</option>
                                    @else
                                    <option value="three">{{__('translate.general.three')}}</option>
                                    <option value="one">{{__('translate.general.one')}}</option>
                                    <option value="two">{{__('translate.general.two')}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.dob')}}</label>
                                <input class="form-control" id="dateMask" placeholder="{{$student->dob}}" type="text" name="dob">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-check col" style="padding-top:20px">
                                <input type="checkbox" class="form-check-input" name="enabled" id="exampleCheck1" value="1" {{$student->enabled == 1 ? 'Checked': ''}}>
                                <label class="form-check-label ml-3 mr-3" for="exampleCheck1">{{__('translate.general.active')}}</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3">{{__('translate.students.edit_student')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection
