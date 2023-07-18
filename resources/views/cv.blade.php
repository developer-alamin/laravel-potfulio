@extends('layout.cv')
@section('title','cv')
@section('content')
	<div class="container cvContent">
		<section class="cvTitle">
			<div class="row cvRow">
				<div class="col-4">
					<div class="cvImg">
						<img src="{{asset('storage/alamin.JPG')}}">
					</div>
				</div>
				<div class="col-4">
					<div class="cvName">
						<h2>MD.ALAMIN ALI</h2>
						<h4>Web Developer</h4>
					</div>
				</div>
				<div class="col-4">
					<div class="cvTitle">
						<ul>
							<li>+88 01740816676</li>
							<li><a href="">alamin@gamil.com</a></li>
							<li><a href="">http://mdalaminali.epizy.com</a></li>
							<li>Doforpur,Billkola,Meherpur</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<br><br>
		<section class="cvDescription">
			<div class="row">
				<div class="col-12">
					<div class="container">
						<div class="aboutDiv">
							<h4>ABOUT ME</h4>	
							<hr class="aboutmeHr">
							<p>
								I Am A Web Developer and Web
								Application specializing in front-end and
								back-end development.Experienced with
								all stages of the development cycle for
								dynamic websites.Well versed in 
								 programming
								languages PHP LARAVEL JQUERY and something javascript and axios with MYSQL Database
							</p>
						</div>
						<div class="skillDiv">
							<h4>SKILLS</h4>
							<hr class="skillHr">
							<ul class="skillNav">
								<li>Php</li>
								<li>Laravel</li>
								<li>Javascript</li>
								<li>Jquery</li>
								<li>Axios</li>
								<li>Bootstrap</li>
								<li>Css</li>
								<li>Wordpress</li>
							</ul>
						</div>
						<div class="majorDiv">
							<h4>Major Proggraming language</h4>
							<hr class="majorhr">
							<ul class="majorNav">
								<li>Php</li>
								<li>Laravel</li>
							</ul>
						</div>
					</div>
				</div>
				</div>
				<br><br>
				<div class="row">
				<div class="col-12">
					<div class="container">
						<h4>EDUCATIONAL BACKGROUND</h4>
						<hr class="educationhr">
						<div class="jscDiv">
							<h3>JSC</h3>
							<p>Hatibhanga Secondary School(2017)</p>
							<p>Secondary School Certificate</p>
							<p>Result : 3.85</p>
						</div>
						<div class="sscDiv">
							<h3>SSC</h3>
							<p>Hatibhanga Secondary School(2019)</p>
							<p>Secondary School Certificate</p>
							<p>Result : 3.56</p>
						</div>
						<div class="hscDiv">
							<h3>HSC</h3>
							<p>Meherpur Govt Collage(2022)</p>
							<p>Result : <b>Pending</b></p>
						</div>
						<div class="workHistory">
							<h4>WORK HISTORY</h4>
							<hr class="workhr">
							<p>Working With Web Developer.Successful Using Php Laravel Jquery Axios And Mysql Database.Successfully managed CRUD & debugging
							operations.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection