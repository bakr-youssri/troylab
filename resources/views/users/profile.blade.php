@extends('layouts.master')
@section('title')
{{__('translate.general.profile')}}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{__('translate.general.profile')}}</h4>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-style1">
								<li class="breadcrumb-item"><a href="/">{{__('translate.general.main')}}</a></li>
								<li class="breadcrumb-item"><a href="/profile">{{__('translate.general.profile')}}</a></li>
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
											<img src="{{URL::asset('assets/img/faces/6.jpg')}}">
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{$user->name}}</h5>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">Main Info</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-body">
													<span>{{__('translate.general.email')}}</span> 
													<span>{{$user->email}}</span>
												</div>
											</div>
										</div>
										<!--skill bar-->
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
										<li class="">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h4 class="tx-15 text-uppercase mb-3">Name</h4>
										<p class="m-b-5">{{$user->name}}</p>
										<h4 class="tx-15 text-uppercase mb-3">Email</h4>
										<p class="m-b-5">{{$user->email}}</p>
									</div>
									<div class="tab-pane" id="settings">
										<form action="/update_user/{{$user->id}}" method="post">
											@csrf
											@method('PATCH')
											<div class="form-group">
												<label for="Username">Username</label>
												<input type="text" value="{{$user->name}}" name="name" class="form-control">
											</div>
											<div class="form-group">
												<label for="Password">Password</label>
												<input type="password" id="Password" name="password" class="form-control">
											</div>
											<div class="form-group">
												<label for="RePassword">Confirm Password</label>
												<input type="password" name="password_confirmation" id="RePassword" class="form-control">
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Edit</button>
										</form>
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