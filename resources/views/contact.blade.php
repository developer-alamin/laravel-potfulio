@extends('layout.app')
@section('title','home')
@section('content')
	<div class="contactRoot">
		<div class="contactPageDiv">
			<div class="container">
				<div class="contacTitle">
					<h1>Contact</h1>
				</div>
				<div class="contactAddress">
					<div class="row">
						<div class="col-4">
							<div class="addressTitle">
								<h3>ADDRESS</h3>
								<div class="addressInfo">
									<p class="info">Doforpur Billkola Meherpur,Khulna Meherpur</p>					
									<li class="contactItem"><i class="fa fa-mobile-phone"></i>01740816676</li>
									<li class="contactItem"><i class="fa fa-envelope"></i>alamin@gmail.com</li>
								</div>
							</div>
							<div class="homeSocialRow">
								<ul>
									@foreach($socialKey as $key => $item)
										<li><a href=""><i class="{{$item->icon}}"></i></a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="col-8">
							<div class="container">
								<div class="contactSendTile">
									<h2>SEND US A NOTE</h2>
									<div class="contactSend">
										<div class="form-group">
											<label>Subject:</label>
											<input type="text" id="contactSub" class="form-control" placeholder="Your Subject..">
										</div>
										<div class="form-row">
											<div class="col-6">
												<label>Name:</label>
												<input type="text" id="contactName" class="form-control" placeholder="Your Name..">
											</div>
											<div class="col-6">
												<label>Email:</label>
												<input type="email" id="contactEmail" class="form-control" placeholder="Your Email..">
											</div>
											<div class="col-12">	
												<label>Massage:</label>
												<textarea class="form-control msg" placeholder="Enter Your Massage..."></textarea>
											</div>
										</div>
										<div class="form-row mt-2">
											<div class="col-4">
												<button class="sendTitle form-control">Send</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$('.sendTitle').click(function() {
	var Sub = $('#contactSub').val();
	var Name = $('#contactName').val();
	var Email = $('#contactEmail').val();
	var Text = $('.msg').val();

	contactSend(Sub,Name,Email,Text);
});
function contactSend(Sub,Name,Email,Text){
	var spenner = "Sending....";
	$('.sendTitle').html(spenner);
	if(Sub.length == false) {
		$('.sendTitle').html('Your Subject');
		 setTimeout(() => {
            $('.sendTitle').html('Send');
        }, 3000);		
	}else if(Name.length == false) {
		$('.sendTitle').html('Your Name');
		setTimeout(() => {
            $('.sendTitle').html('Send');
        }, 3000);
	}else if (Email.length == false) {
		$('.sendTitle').html('Your Email');
		setTimeout(() => {
            $('.sendTitle').html('Send');
        }, 3000);
	} else if (Text.length == false) {
		$('.sendTitle').html('Your Massage');
		setTimeout(() => {
            $('.sendTitle').html('Send');
        }, 3000);	
	} else{

		var  url = '/contectSend';
		var data = {name:Name,sub:Sub,email:Email,text:Text};

		axios.post(url,data)
		  .then(function (response) {
		   if (response.status == 200 ) {
		   		$('.sendTitle').html('Success');
			   setTimeout(() => {
		            $('.sendTitle').html('Send');
		        }, 3000);
		   } else {
		   		$('.sendTitle').html('Faild');
			   setTimeout(() => {
		            $('.sendTitle').html('Send');
		        }, 3000);
		   }
		    
		  })
		  .catch(function (error) {
		  	$('.sendTitle').html('Faild');
		   setTimeout(() => {
	            $('.sendTitle').html('Send');
	        }, 3000);
		  });

	}
	
}




</script>
@endsection