@extends('layout.admin')
@section('title','Admin | Profile')
@section('content')
	<div class="profilePage d-none">
		<div class="profileRow">
			<div class="profileImgRow">
				<img src="" id="CvPriviewImg">
			</div>
			<hr class="profileHr"></hr>
			<div class="cvDiv">
				<div class="form-row">
					<div class="col-6">
						<label>Photo</label>
						<input type="file" accept="image/*" id="img" placeholder="Enter Your Photo" class="form-control">
					</div>
				</div>
				<p id="profileId" class="d-none"></p>
				<div class="form-row">
					<div class="col-3">
						<label>Name:</label>
						<input value="" type="text" id="name" class="form-control" placeholder="Enter Your Name">
					</div>
					<div class="col-3">
						<label>Father Name:</label>
						<input value="" type="text" id="father" class="form-control" placeholder="Enter Your Father Name">
					</div>
					<div class="col-3">
						<label>Mother Name:</label>
						<input value="" type="text" id="mother" class="form-control" placeholder="Enter Your Mother Name">
					</div>
					<div class="col-3">
						<label>Email:</label>
						<input value="" type="email" id="email" class="form-control" placeholder="Enter Your Email">
					</div>		
				</div>
				<div class="form-row">
					<div class="col-3">
						<label>Mobile</label>
						<input value="" type="number" id="mobile" class="form-control" placeholder="Enter Your Phone Number">
					</div>
					<div class="col-3">
						<label for="">Work Post:</label>
						<input value="" type="text" id="workpost" placeholder="Enter Your Post" class="form-control">
					</div>
					<div class="col-3">
						<label for="">BirthDay:</label>
						<input value="" type="text" id="birth" class="form-control">
					</div>
					<div class="col-3	">
						<label for="">Post Office:</label>
						<input value="" type="text" id="postoffice" placeholder="Enter Your Post Office" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col-6">
						<label for="">Facebook:</label>
						<input value="" type="url" id="facebook" placeholder="Enter Your Facebook" class="form-control">
					</div>
					<div class="col-6">
						<label for="">Githab:</label>
						<input value="" type="url" id="githab" placeholder="Enter Your githab" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col-6">
						<label for="">Linkedin:</label>
						<input value="" type="url" id="linkedin" placeholder="Enter Your Linkedin"  class="form-control">
					</div>
					<div class="col-6">
						<label for="">Address:</label>
						<input value="" type="text" id="address" placeholder="Enter Your addeess" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col-12">
						<label for="">Goggle Map Link:</label>
						<input value="" type="url" id="map" placeholder="Enter Your Map" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<label for="">About Me</label>
					<textarea id="aboutId" class="form-control" placeholder="Enter Your Text..."></textarea>
				</div>
				<div class="form-row">
					<div class="col-4">
						<button class="profileBtn" type="submit">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- loading code start form here -->
<div class="row p-5" id="loader">
  <div class="col-12 text-center">
    <img src="{{asset('img/Spinner.gif')}}">
  </div>
</div>
<div class="row mt-5 d-none" id="visitnothingImgRow">
  <div class="col-12 text-center nothingImgRow">
    <img src="{{asset('img/nothing.webp')}}">
  </div>
</div> 


@endsection

@section('script')
<script type="text/javascript">
	getProfile();

	var spenner = "<span class='spinner-border text-primary spinner-border-sm' role='status' aria-hidden='true'></span> Loading...";

	function getProfile() {
		var url = '/admin/getProfile';
		axios.get(url)
		.then(function(response) {
			if (response.status == 200) {
				$('.profilePage').removeClass('d-none');
				$('#loader').addClass('d-none');
				var profileData = response.data;
				$('#profileId').html(profileData[0].id);
				$('#CvPriviewImg').attr('src',profileData[0].photo);
				$('#name').val(profileData[0].name);
				$('#father').val(profileData[0].father);
				$('#mother').val(profileData[0].mother);
				$('#email').val(profileData[0].email);
				$('#mobile').val(profileData[0].mobile);
				$('#workpost').val(profileData[0].workPost);
				$('#birth').val(profileData[0].birth);
				$('#postoffice').val(profileData[0].postOffice);
				$('#facebook').val(profileData[0].facebook);
				$('#githab').val(profileData[0].github);
				$('#linkedin').val(profileData[0].linkedin);
				$('#address').val(profileData[0].address);
				$('#map').val(profileData[0].map);
				$('#aboutId').val(profileData[0].MyText);
			} else {
				$('#visitnothingImgRow').removeClass('d-none');
				$('#loader').addClass('d-none');
			}
		})
		.catch(function(error) {
			$('#visitnothingImgRow').removeClass('d-none');
			$('#loader').addClass('d-none');
		})
	}


	$(document).ready(()=>{
	  $('#img').change(function(){
	    const file = this.files[0];
	    if (file){
	      let reader = new FileReader();
	      reader.onload = function(event){
	        console.log(event.target.result);
	        $('#CvPriviewImg').attr('src', event.target.result);
	      }
	      reader.readAsDataURL(file);
	    }
	  });
	});

$('.profileBtn').click(function() {
	$('.profileBtn').html(spenner);
	var id = $('#profileId').html();
	var oldImg     = $('#CvPriviewImg').attr('src');
	var NewImg     = $('#img').prop('files')[0];
	var name       = $('#name').val();
	var father     = $('#father').val();
	var mother     = $('#mother').val();
	var email      = $('#email').val();
	var mobile     = $('#mobile').val();
	var workPost   = $('#workpost').val();
	var birth      = $('#birth').val();
	var postoffice = $('#postoffice').val();
	var facebook   = $('#facebook').val();
	var githab     = $('#githab').val();
	var linkedin   = $('#linkedin').val();
	var address    = $('#address').val();
	var map        = $('#map').val();
	var about      = $('#aboutId').val();

	var url = '/admin/UpdateProfile';
	var data = new FormData();
	data.append('id',id);
	data.append('name',name);
	data.append('father',father);
	data.append('mother',mother);
	data.append('email',email);
	data.append('mobile',mobile);
	data.append('workPost',workPost);
	data.append('birth',birth);
	data.append('postoffice',postoffice);
	data.append('facebook',facebook);
	data.append('githab',githab);
	data.append('linkedin',linkedin);
	data.append('address',address);
	data.append('map',map);
	data.append('about',about);
	data.append('oldImg',oldImg);
	data.append('NewImg',NewImg);

	axios.post(url,data)
	.then(function(response) {
		if (response.status == 200) {
			$('.profileBtn').html('Update Success');
			setTimeout(()=>{
				$('.profileBtn').html('Update');
			});
			toastr.success('Your CV Updateed Success');
			getProfile();
		} else {
			$('.profileBtn').html('Update Faild');
			setTimeout(()=>{
				$('.profileBtn').html('Update');
			});
			toastr.error('Your CV Updateed Faild');
			getProfile();
		}
	})
	.catch(function(error) {
		$('.profileBtn').html('Update Faild');
		setTimeout(()=>{
			$('.profileBtn').html('Update');
		});
		toastr.error('Your CV Updateed Faild');
		getProfile();
	})

})
</script>
@endsection

