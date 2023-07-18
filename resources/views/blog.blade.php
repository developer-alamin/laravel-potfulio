@extends('layout.app')
@section('title','blog')
@section('content')
<div class="BlogRoot">
	<div class="BlogPageDiv">
		<div class="BlogTitleRow">
			<h2>Blog</h2>
		</div>
		<div class="container">
			<div class="row">
				@foreach($blogKey as $item)
				<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
					<div class="card">
						<div class="BlogColImgDiv">
							<img src="{{$item->img}}" alt="">
						</div>
						<div class="BlogImgTitle">
							<h3>Name : {{$item->name}}</h3>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="pagination">
			<div class="container">
				{{$blogKey->links('pagination::bootstrap-4')}}
			</div>
		</div>
	</div>
</div>
@endsection