<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>
	@yield('title')
	</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/kalyani_dark.png" type="image/x-icon"/>
    {{-- <img src="{{asset('assets/img/kalyani_light.png')}}" type="image/x-icon"/> --}}
	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/azzara.min.css')}}">
    <link rl="stylesheet" type="text/css"
    href="hettps://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css
    ">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}



</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="#" class="logo">
					<img src="{{asset('assets/img/kalyani_light.png')}}" width="120" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<li class="nav-item dropdown hidden-caret">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 			aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }}
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
				</ul>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="main-panel">
				<div class="content">
					@yield('content')
				</div>
		    </div>
		</div>


		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav">
						<li class="nav-item">
							<a href="#">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item {{ Request::is('banner') ? 'active' : ''}}">
							<a  href="{{ route('banner.index') }}">
								<i class="fas fa-layer-group"></i>
								<p>Banner</p>
							</a>

						</li>
						<li class="nav-item {{ Request::is('category') ? 'active' : ''}}">
							<a href="{{ route('category.index') }}">
								<i class="fas fa-car-side"></i>
								<p>Category</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('models') ? 'active' : ''}}">
							<a href="{{ url('/models') }}">
								<i class="fas fa-pen-square"></i>
								<p>Models</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>

							<li class="nav-item {{ Request::is('varients') ? 'active' : ''}}">
								<a  href="{{ route('varients.index') }}">
								<i class="fas fa-pen-square"></i>
								<p>Varients</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('car') ? 'active' : ''}}">
							<a  href="{{ route('car.index') }}">
								<i class="fas fa-car"></i>
								<p>Car</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('service') ? 'active' : ''}}">
							<a href="{{url('/service')}}">
								<i class="fas fa-map-marker-alt"></i>
								<p>Services</p>
								<!-- <span class="caret"></span> -->
							</a>

						</li>

						<li class="nav-item {{ Request::is('servicetype') ? 'active' : ''}}">
							<a href="{{route('servicetype.index')}}">
								<i class="fas fa-map-marker-alt"></i>
								<p>ServiceType</p>
							</a>

						</li>
						<li class="nav-item {{ Request::is('specname') ? 'active' : ''}}">
							<a href="{{ route('specname.index') }}">
								<i class="far fa-chart-bar"></i>
								<p>Specification</p>
							</a>
						</li>
				    	<li class="nav-item {{ Request::is('seasons') ? 'active' : ''}}">
							<a href="{{ route('seasons.index') }}">
								<i class="fas fa-paint-roller"></i>
								<p>Seasons</p>
							</a>
						</li>
							<li class="nav-item {{ Request::is('update-season') ? 'active' : ''}}">
                            <a href="{{ route('update-season.index') }}">
								<i class="fas fa-bars"></i>
								<p>Seasons Update</p>
							</a>
						</li>
				    	<li class="nav-item {{ Request::is('iconlocation') ? 'active' : ''}}">
                            <a href="{{ route('iconlocation.index') }}">
								<i class="fas fa-location-arrow"></i>
								<p>Icon Location</p>
							</a>
						</li>
						 <li class="nav-item {{ Request::is('commonfaq') ? 'active' : ''}}">
                            <a href="{{ route('commonfaq.index') }}">
								<i class="far fa-question-circle"></i>
								<p>Common FAQ</p>
							</a>
						</li>

                        <li class="nav-item {{ Request::is('servicefaq') ? 'active' : ''}}">
                            <a href="{{ route('servicefaq.index') }}">
								<i class="fas fa-car-crash"></i>
								<p>Service FAQ</p>
							</a>
						</li>

					    <li class="nav-item {{ Request::is('serviceseason') ? 'active' : ''}}">
                            <a href="{{ route('serviceseason.index') }}">
								<i class="fab fa-mixcloud"></i>
								<p>Service Season</p>
							</a>
						</li>
					   <li class="nav-item {{ Request::is('attachseasonservice') ? 'active' : ''}}">
                            <a href="{{ route('attachseasonservice.index') }}">
								<i class="fas fa-cloud"></i>
								<p>Attach Season Service</p>
							</a>
						</li>

                        <li class="nav-item {{ Request::is('servicebanner') ? 'active' : ''}}">
                            <a href="{{ route('servicebanner.index') }}">
								<i class="fas fa-layer-group"></i>
								<p> Service Banner </p>
							</a>
						</li>

                        <li class="nav-item {{ Request::is('servicevideo') ? 'active' : ''}}">
                            <a href="{{ route('servicevideo.index') }}">
								<i class="fab fa-youtube"></i>
								<p> Service Video </p>
							</a>
						</li>

				     <li class="nav-item {{ Request::is('enquiry') ? 'active' : ''}}">
                            <a href="{{ route('enquiry.index') }}">
								<i class="fas fa-question"></i>
								<p>Enquiry</p>
							</a>
						</li>
                        <li class="nav-item {{ Request::is('enquirybannerimg') ? 'active' : ''}}">
                            <a href="{{route('enquirybannerimg.index')}}">
								<i class="fas fa-images"></i>
								<p>Enquiry Banner Image</p>
							</a>
						</li>
                        <li class="nav-item {{ Request::is('policybannerimg') ? 'active' : ''}}">
                            <a href="{{route('policybannerimg.index')}}">
								<i class="far fa-images"></i>
								<p>Policy Banner Image</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('location') ? 'active' : ''}}">
                            <a href="{{route('location.index')}}">
								<i class="fas fa-map-marker-alt"></i>
								<p>Location</p>
							</a>
						</li>

                        <li class="nav-item {{ Request::is('blogpage') ? 'active' : ''}}">
                            <a href="{{route('blogpage.index')}}">
								<i class="fab fa-blogger-b"></i>
								<p>Blog Pages</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

	</div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Azzara JS -->
<script src="{{asset('assets/js/ready.min.js')}}"></script>
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});

		//Delete Row
 		$('.delete-confirm').click(function(event) {
		      var form =  $(this).closest("form");
		      var name = $(this).data("name");
		      event.preventDefault();
		      swal({
		        title: 'Are you sure?',
				  text: "You won't be able to revert this!",
		          type: 'warning',
		          buttons:{
		          	cancel: {
								visible: true,
								text : 'No, cancel!',
								className: 'btn btn-danger'
								},
						confirm: {
								text : 'Yes, delete it!',
								className : 'btn btn-success'
							}
		         	 }

		            })
		      		.then((willDelete) => {
						if (willDelete) {
							form.submit();
							swal("Poof! Your imaginary file has been deleted!", {
								icon: "success",
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}

							});
							} else {
							swal("Your imaginary file is safe!", {
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
							    }
						    });
						}
				});
			});

 		@if(Session::has('success'))
			swal("Great job","{!!  Session::get('success') !!}","success",{
			button:"Ok",
		})
		@endif
		@if(Session::has('updated'))
			swal("Graet job","{!!  Session::get('updated') !!}","success",{
			button:"Ok",
		})
		@endif

	</script>
	@yield('scripts')
</body>
</html>
