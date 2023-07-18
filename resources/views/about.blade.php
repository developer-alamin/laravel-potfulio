@extends('layout.app')
@section('title','home')
@section('content')
<div class="aboutRoot">
	<div class="container">
		<div class="aboutContentDiv">
		<div class="aboutTitle">
			<h2>ABOUT ME</h2>
		</div>
		<div class="aboutPageRow row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-8 aboutCol">
				<div class="">
					<div class="aboutHeadingRow">
						<h2>I'm <span class="aboutSpan">{{$aboutCvKey->name}} </span>, {{$aboutCvKey->workPost}}</h2>
					</div>
					<div class="aboutHeadingTitleDiv">
						<p>{{$aboutCvKey->MyText}}</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 addressCol">
				<div class="addressDiv">
					<ul>
						<li>Name: Md.Alamin</li>
						<li>Email: mdalamin23@gmail.com</li>
						<li>Age: 20</li>
						<li>Nationality: Bangladeshi</li>
						<li>Languages: English,Bangla</li>
						<li>From: Doforpur,Billkola,Meherpur</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="aboutDoingDiv">
			<div class="doingTitle">
				<h3>What I Do?</h3>
			</div>
			<div class="aboutDoingRow container ">
				<div class="row">
					@foreach($aboutKey as $item)
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<div class="aboutLogutitleDiv">
							<div class="deignImgDIv">
								<img  src="{{$item->img}}" alt="">
							</div>
							<div class="DoingWorkTitleDiv">
								<h4>{{$item->name}}</h4>
								<p>{{$item->nameTitle}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection