@extends('layout.app')
@section('title','potfulio')
@section('content') 
<div class="potfulioroot" style="min-height: 100vh">
	<div class="potfulioPage">
		<div class="container">
			<div class="potfulioTitle">
				<h2>POTFULIO</h2>
			</div>
			<div class="row">
				@foreach($potfulioKey as $item)
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 potfulioCol">
					<div class="potfulioImgDiv">
						<img src="{{$item->img}}" alt="">
						<div class="potfulioImgTitle">
							<h6>Name : {{$item->name}}</h6>
							<h5>Category : {{$item->category}}</h5>
							<h5>Technology : {{$item->technology}}</h5>
							<p>Published : {{$item->date}}</p>
						</div>
						<div class="potfulioImgInfo mb-3">
							<button class="potfuliobtn">View Info</button>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection