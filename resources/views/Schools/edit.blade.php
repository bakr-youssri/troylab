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
    {{__('translate.schools.edit_school')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('translate.schools.edit_school')}}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item"><a href="/">{{__("translate.general.main")}}</a></li>
                    <li class="breadcrumb-item"><a href="{{Route('schools.index')}}">{{__("translate.schools.schools")}}</a></li>
                    <li class="breadcrumb-item active">{{__('translate.schools.edit_school')}}</li>
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
                    <form action="{{Route('schools.update', $school->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.name')}}</label>
                                <input type="text" class="form-control" id="inputName" name="name" value="{{$school->name}}" required>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{__('translate.general.description')}}</label>
                                <textarea class="form-control" name="description" rows="3" style="resize:none">{{$school->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check col" style="padding-top:20px">
                                <input type="checkbox" class="form-check-input" name="enabled" id="exampleCheck1" value="1" {{$school->enabled == 1 ? 'checked':''}}>
                                <label class="form-check-label ml-3 mr-3" for="exampleCheck1">{{__('translate.general.active')}}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3">{{__('translate.schools.edit_school')}}</button>
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
