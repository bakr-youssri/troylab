@extends('layouts.master')
@section('title')
{{__('translate.students.show_students')}}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{__('translate.students.show_student')}}</h4>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-style1">
								<li class="breadcrumb-item"><a href="/">{{__('translate.general.main')}}</a></li>
								<li class="breadcrumb-item"><a href="{{Route('students.index')}}">{{__('translate.students.students')}}</a></li>
								<li class="breadcrumb-item active">{{__('translate.students.show_student')}}</li>
							</ol>
						</nav>		
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}">
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{$student->name}}</h5>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">Main Info</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-body">
													<span>{{__('translate.general.email')}}</span> 
													<span>{{$student->email}}</span>
												</div>
											</div>
											<div class="media">
												<div class="media-body">
													<span>{{__('translate.general.phone')}}</span> <span>{{$student->mob}}</span>
												</div>
											</div>
										</div>	
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ABOUT ME</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h4 class="tx-15 text-uppercase mb-3">{{__('translate.schools.school')}}</h4>
										<p class="m-b-5">{{$student->school->name}}</p>
										<div class="m-t-30">
											<h4 class="tx-15 text-uppercase mt-3">{{__('translate.general.status')}}</h4>
											@if($student->enabled == 1)
											<label class="badge badge-success">{{__('translate.general.active')}}</label>
											@else
											<label class="badge badge-danger">{{__('translate.general.inactive')}}</label>
											@endif
										</div>
									</div>
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
@endsection