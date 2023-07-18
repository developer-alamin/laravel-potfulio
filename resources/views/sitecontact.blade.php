@extends('layout.app')
@section('title','contact')
@section('content')
<div class="contactRoot">
	<div class="contactPage">
		<div class="contactTilte">
			<h3>CONTACT</h3>
		</div>
		 <div class="container">
		 	<div class="row m-auto">
		 		<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
		 			<div class="address">
		 				<div class="contactAddressHeading">
		 					<h3>ADDRESS</h3>
		 				</div>
		 				<div class="addressTitleRow">
		 					<h6>Doforpur,Meherpur,Khulna,Bangladesh<Doforpur></Doforpur></h6>
		 				</div>
		 				<div class="addressMobileRow">
		 					<i class="fa fa-mobile-phone"></i>
		 					<li>01740816676</li>
		 				</div>
		 				<div class="addressGmailRow">
		 					<i class="fa fa-envelope"></i>
		 					<li>alamin@gmail.com</li>
		 				</div>
		 				<div class="homeSocialRow">
		                  <ul>
			                 <li><a href=""><i class="fab fa-facebook"></i></a></li>
			                  <li><a href=""><i class="fab fa-twitter"></i></a></li>
			                 <li><a href=""><i class="fab fa-linkedin"></i></a></li>
			                 <li><a href=""><i class="fab fa-github"></i></a></li>
		                   </ul>
	                   </div>
		 			</div>
		 		</div>
		 		<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
		 			<div class="sendTitle">
		 				<h2>SEND US A NOTE</h2>
		 			</div>
		 			<div class="formRow">
		 				<div class="form-row">
		 					<div class="col-12">
		 						<label for="name">Name</label>
		 					    <input type="text" id="name" placeholder="Enter Your Name" class="form-control">
		 					</div>
		 					<div class="col-6">
		 						<label for="subject">Subject</label>
		 						<input type="text" id="sub" placeholder="Enter Your Subject" class="form-control">
		 					</div>
		 					<div class="col-6">
		 						<label for="subject">Email</label>
		 						<input type="email" id="email"  placeholder="Enter Your Email" class="form-control">
		 					</div>
		 					<div class="col-12">
		 						<label for="name">Massage</label>
		 					    <textarea name="textarea" id="text" class="form-control" placeholder="Your Massege"></textarea>
		 					</div>
		 					<div class="col-4">
		 						<br>
		 						<button onclick="contactSend()" id="button" type="button" class="btn btn-primary btn-lg btn-block">Send</button>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div>
	</div>
</div>
@endsection