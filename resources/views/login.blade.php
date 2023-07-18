@extends('layout.app')
@section('title','contact')
@section('content')
	<div class="loginPageDiv" style="min-height: 600px">
		<div class="row loginRow">
			<div class="col-12">
				<div class="loginFormPage">
					<div class="adminLoginTitl">
						<h3>Admin Login</h3>
					</div>
					<form action="" class="loginForm">
						<div class="form-row">
							<div class="col-12">
								<label>UserName:</label>
								<input name="userName" value="" type="text" id="userNameId" placeholder="User Name" class="form-control">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<label>Password:</label>
								<input name="password" value="" type="password" id="passwordId" placeholder="Admin Password" class="form-control">
							</div>
						</div>
						<div class="form-row">
							<div class="col-12">
								<button type="submit" id="loginButtonId" name="loginButton">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	/*login page js code form here*/
$('.loginForm').on('submit',function(event) {
	event.preventDefault();
	var data = $(this).serializeArray();

	var userName = data[0]['value'];
	var password = data[1]['value'];

	if (userName.length == false && password.length == false) {
		toastr.error('Enter Your UserName And Password');
	} else {
		var url = '/onlogin';
		var admindata = {user:userName,pass:password};

		axios.post(url,admindata)
		.then(function(response) {
			if (response.status == 200 && response.data == 1) {
				window.location.href="admin/";
			} else {
				toastr.warning('Login Faild!!Please Try Agein');
			}
		})
		.catch(function(error) {
			toastr.warning('Login Faild!!Please Try Agein');
		})
	}

})
</script>
@endsection