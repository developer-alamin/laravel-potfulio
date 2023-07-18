<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="icon" href="{{asset('img/01740816676.JPG')}}">
	<!-- fontAwesome cdn link start form here -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
   	rel="stylesheet"/>
   	<!-- google font awesome cdn link start form here -->
   	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  	rel="stylesheet"/>
  	<!-- MDB -->
  	<link rel="stylesheet" href="{{asset('css/mdb.min.css')}}"/>
  	<link rel="stylesheet" href="{{asset('css/toastr.css')}}"/>
  	<!-- porggress cdn link start form here -->
  	<link rel="stylesheet" href="{{asset('css/progresscircle.css')}}">
  	<!-- bootstrap cdn link start form here -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<!-- dataTables cdn start form here -->
	<link rel="stylesheet"  href="{{asset('css/jquery.dataTables.min.css')}}">
	<link rel="stylesheet"  href="{{asset('css/select.dataTables.min.css')}}">
	<!-- custom css code for start form here -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/site.css')}}">
</head>
<body>
	<div class="root">
		<div class="Rootrow">
			<div class="leftCollmun">					
				@includeif('layout.menu')
			</div>
			<div class="rightCollumn">
					@yield('content')
			</div>
		</div>
	</div>
	
		<!-- jQuery Propper Bootstrap js cdn link form here -->
		<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	   <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
	   <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	   <!-- MDB -->
		<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
		<!-- Toastr js cdn link -->
  		<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>

  		<!-- dataTables js cdn start form here -->
  		<script type="text/javascript" src="{{'js/jquery.dataTables.min.js'}}"></script>
  		<script type="text/javascript" src="{{'js/dataTables.select.min.js'}}"></script>
  		<script type="text/javascript" src="{{'js/particles.min.js'}}"></script>
  		<!-- proggress js cdn link start form here -->
  		<script type="text/javascript" src="{{'js/progresscircle.js'}}"></script>
		<!-- ajex cdn link start form jere -->
	    <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
	    <!-- custom js code for -->
	<script type="text/javascript" src="{{asset('js/site.js')}}"></script>
	@yield('script')
</body>
</html>