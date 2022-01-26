@extends('layouts.master')
@section('title')
{{__('translate.schools.schools')}}
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{__('translate.schools.schools')}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-style1">
								<li class="breadcrumb-item">
									<a href="/">{{__('translate.general.main')}}</a>
								</li>
								<li class="breadcrumb-item active">{{__('translate.schools.schools')}}</li>
							</ol>
						</nav>						
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<div class="modal" id="modaldemo1">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">{{__('translate.schools.delete_school')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<h6>{{__('translate.general.delete_sure')}}</h6>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn-danger deleteSchool" type="button">{{__('translate.schools.delete_school')}}</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{__('translate.general.cancle')}}</button>
							</div>
						</div>
					</div>
				</div>
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div></div>
									<a class="btn btn-info mb-3" href="{{Route('schools.create')}}">{{__('translate.schools.add_school')}}</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr class="text-center">
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{__('translate.general.name')}}</th>
												<th class="wd-10p border-bottom-0">{{__('translate.students.students')}}</th>
												<th class="wd-10p border-bottom-0">{{__('translate.general.status')}}</th>
												<th class="wd-25p border-bottom-0">{{__('translate.general.action')}}</th>
											</tr>
										</thead>
										<tbody>
											@foreach($schools as $index=>$school)
											<tr class="text-center row{{$school->id}}">
												<td>{{$index+1}}</td>
												<td>{{$school->name}}</td>
												<td>{{$school->student->count()}}
												<td>
													@if($school->enabled == 1)
													<label class="badge badge-success">{{__('translate.general.active')}}</label>
													@else
													<label class="badge badge-danger">{{__('translate.general.inactive')}}</label>
													@endif
												</td>
												<td>
													<a href="{{Route('schools.show', $school->id)}}" class="btn btn-sm btn-primary">
														<i class="las la-search"></i>
													</a>
													<a href="{{Route('schools.edit', $school->id)}}" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a data-target="#modaldemo1" data-toggle="modal" class="btn btn-sm btn-danger trash" data-trash="{{$school->id}}">
														<i class="las la-trash"></i>
													</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script>
	$(document).ready(function() {
		$('.trash').click(function(){
			$('.deleteSchool').val($(this).attr('data-trash'));
		});
		$('.deleteSchool').on('click', function() {
			var school_id = $(this).val();
			if (school_id) {
				$.ajax({
					url: "schools/" + school_id,
					type: "Delete",
					data:{
						'_token':"{{csrf_token()}}",
						'id':school_id
					},
					success: function(data) {
						$('#modaldemo1').modal('hide');
						if(data.status == 'success'){
							$('.row'+school_id).remove();
							toastr.error(data.message);
						}else{
							toastr.error(data.message);
						}
					},
				});
			} else {
				console.log('AJAX load did not work');
			}
		});

	});

</script>
@endsection