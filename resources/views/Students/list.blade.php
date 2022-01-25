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
							<h4 class="content-title mb-0 my-auto">Students</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-style1">
								<li class="breadcrumb-item"><a href="/">Home</a></li>
								<li class="breadcrumb-item active">Students</li>
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
								<h6 class="modal-title">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<h6>Modal Body</h6>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn-primary" type="button">Save changes</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr class="text-center">
												<th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">Name</th>
												<th class="wd-20p border-bottom-0">Email</th>
												<th class="wd-15p border-bottom-0">Phone</th>
												<th class="wd-10p border-bottom-0">Status</th>
												<th class="wd-15p border-bottom-0">School</th>
												<th class="wd-25p border-bottom-0">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($students as $index => $student)
											<tr class="text-center">
												<td>{{$index+1}}</td>
												<td>{{$student->name}}</td>
												<td>{{$student->email}}</td>
												<td>{{$student->mob}}</td>
												<td>
													@if($student->enabled == 1)
													<label class="badge badge-success">Active</label>
													@else
													<label class="badge badge-danger">Inactive</label>
													@endif
												</td>
												<td>{{$student->school->name}}</td>
												<td>
													<a href="#" class="btn btn-sm btn-primary">
														<i class="las la-search"></i>
													</a>
													<a href="{{Route('students.edit', $student->id)}}" class="btn btn-sm btn-info">
														<i class="las la-pen"></i>
													</a>
													<a data-target="#modaldemo1" data-toggle="modal" href="#" class="btn btn-sm btn-danger">
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
		$('select[name="Section"]').on('change', function() {
			var SectionId = $(this).val();
			if (SectionId) {
				$.ajax({
					url: "{{ URL::to('section') }}/" + SectionId,
					type: "GET",
					dataType: "json",
					success: function(data) {
						$('select[name="product"]').empty();
						$.each(data, function(key, value) {
							$('select[name="product"]').append('<option value="' +
								value + '">' + value + '</option>');
						});
					},
				});

			} else {
				console.log('AJAX load did not work');
			}
		});

	});

</script>
@endsection