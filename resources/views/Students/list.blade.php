@extends('layouts.master')
@section('title')
	Students
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
							<h4 class="content-title mb-0 my-auto">{{__('translate.students.students')}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-style1">
								<li class="breadcrumb-item"><a href="/">{{__('translate.general.main')}}</a></li>
								<li class="breadcrumb-item active">{{__('translate.students.students')}}</li>
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
								<h6 class="modal-title">{{__('translate.students.delete_student')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<h6>{{__('translate.general.delete_sure')}}</h6>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn-danger deleteStudent" type="button">{{__('translate.students.delete_student')}}</button>
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
									<a class="btn btn-info mb-3" href="{{Route('students.create')}}">{{__('translate.students.add_student')}}</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr class="text-center">
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{__('translate.general.name')}}</th>
												<th class="wd-20p border-bottom-0">{{__('translate.general.email')}}</th>
												<th class="wd-15p border-bottom-0">{{__('translate.schools.school')}}</th>
												<th class="wd-5p border-bottom-0">{{__('translate.general.level')}}</th>
												<th class="wd-5p border-bottom-0">{{__('translate.general.gender')}}</th>
												<th class="wd-10p border-bottom-0">{{__('translate.general.status')}}</th>
												<th class="wd-25p border-bottom-0">{{__('translate.general.action')}}</th>
											</tr>
										</thead>
										<tbody>
											@foreach($students as $index => $student)
											<tr class="text-center row{{$student->id}}">
												<td>{{$index+1}}</td>
												<td>{{$student->name}}</td>
												<td>{{$student->email}}</td>
												<td>{{$student->school->name}}</td>
												<td>{{$student->level}}</td>
												<td>{{$student->gender}}</td>
												<td>
													@if($student->enabled == 1)
													<label class="badge badge-success">{{__('translate.general.active')}}</label>
													@else
													<label class="badge badge-danger">{{__('translate.general.inactive')}}</label>
													@endif
												</td>
												<td>
													<a href="{{Route('students.show', $student->id)}}" class="btn btn-sm btn-primary">
														<i class="las la-search"></i>
													</a>
													<a href="{{Route('students.edit', $student->id)}}" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a data-target="#modaldemo1" data-toggle="modal" class="btn btn-sm btn-danger trash" data-trash="{{$student->id}}">
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
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script>
	$(document).ready(function() {
		$('.trash').click(function(){
			$('.deleteStudent').val($(this).attr('data-trash'));
		});
		$('.deleteStudent').on('click', function() {
			var student_id = $(this).val();
			if (student_id) {
				$.ajax({
					url: "students/" + student_id,
					type: "Delete",
					data:{
						'_token':"{{csrf_token()}}",
						'id':student_id
					},
					success: function(data) {
						$('#modaldemo1').modal('hide');
						if(data.status == 'success'){
							$('.row'+student_id).remove();
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