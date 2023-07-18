@extends('layout.admin')
@section('title','Admin|Home Page')
@section('content')
<div class="VisitorTable">
	<div class="homeCardDiv">
		<div class="row adminRowCard mt-4">
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$visitor}}</h4>
						<h4 class="cardText">All Visitor</h4>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$cv}}</h4>
						<h4 class="cardText">CV</h4>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$resume}}</h4>
						<h4 class="cardText">Education</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4 adminRowCard">
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$skill}}</h4>
						<h4 class="cardText">Skill</h4>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$blog}}</h4>
						<h4 class="cardText">Blog</h4>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$potfulio}}</h4>
						<h4 class="cardText">Potfulio</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4 adminRowCard">
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$contact}}</h4>
						<h4 class="cardText">Massage</h4>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h4 class="cardCount">{{$social}}</h4>
						<h4 class="cardText">Social</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection