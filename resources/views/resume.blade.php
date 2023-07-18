@extends('layout.app')
@section('title','resume')
@section('content')
<div class="resumeRoot">
	<div class="container">
		<div class="resumePageDiv">
			<div class="resumeTitle">
				<h1>Resume</h1>
			</div>
			<div class="educationImgTitle">
				<div class="educationTitle">
					<i class="fas fa-graduation-cap"></i>
					<h3>Educational Qualifications</h3>
				</div>
			</div>
			@foreach($resumeKey as $item)
			<div class="educationRow row">
				<div class="col-3 ColYear">
					<h3>{{$item->year}}</h3>
				</div>
				<div class="col-9 jscColTitle">
					<div class="examheadTitle">
						<h2>{{$item->examName}}</h2>
						<h4>{{$item->instituteName}}</h4>
						<h5>Result Year :{{$item->resultYear}}</h5>
						<h5>Result :{{$item->result}}</h5>
						<p>{{$item->examTitle}}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="skillPageDiv">
		<div class="container">
			<div class="skillTitle">
				<h1 class="skillheading"><i class="fas fa-laptop-code mr-3"></i>Skill Point</h1>
			</div>
			<div class="skillRow row">
				@foreach($skillKey as $skillItem)
				<div class="col-3 proggressCollumn">
					<div id="proggressDiv">
						<div class="circlechart html" data-percentage="{{$skillItem->point}}">{{$skillItem->name}}</div>
					</div>	
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	//$('.html').attr('data-percentage',90);
	$(document).ready(function() {
		$('.circlechart').circlechart();
	});
</script>
@endsection