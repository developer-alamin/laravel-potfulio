<div class="adminPage">
	<header>
		<div class="row">
			<div class="col-6 headerColRightSide ">
				<a href="" class="d-none adminProfileName">Admin</a>
				<div class="profileNithing d-none">
				 	<h4>Nothing User Name And Image..</h4>
				 </div>
				 <div class="ProfileLoader">
					 <h4>Loading...</h4>
				 </div>
			</div>
			<div class="col-6 userCol headerColLeftSide">
				<div class="userImg d-none">
					<img id="headerImgId" src="" alt="">
				</div>
			</div>
		</div>
	</header>
	<div class="adminRow">
		<div class="RightSide">
			<ul class="siteBarNav">
				<li><a href="{{url('admin/')}}"><i class="fas fa-home"></i>Home</a></li>
				<li><a href="{{url('/admin/visitor')}}"><i class="fa fa-users"></i>Visitor</a></li>
				<li><a href="{{url('/admin/about')}}"><i class="fas fa-laptop-code"></i>About</a></li>
				<li><a href="{{url('/admin/resume')}}"><i class="fas fa-graduation-cap"></i>Resume</a></li>
				<li><a href="{{url('/admin/blog')}}"><i class="fab fa-blogger"></i>Blog</a></li>
				<li><a href="{{url('/admin/potfulio')}}"><i class="fa fa-briefcase"></i>Potfulio</a></li>
				<li><a href="{{url('/admin/contact')}}"><i class="fas fa-comments"></i>Contact</a></li>
				<li><a href="{{url('/admin/social')}}"><i class="far fa-bell"></i>Social</a></li>
				<li><a href="{{url('/admin/skill')}}"><i class="fas fa-laptop-code"></i>Work Skills</a></li>
			</ul>
		</div>
		<div class="leftSide">
			<div class="container">
				
				<!-- Profile modal  -->
				<div class="modal ml-auto fade" id="HeaderImgModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				   aria-hidden="true">
				   <div class="modal-dialog">
				     <div class="modal-content" id="headerModalContent">
				       <div class="modal-header" id="headerModalHeader">
				        <div class="headerImgDiv">
				        	<img src="{{asset('img/admin.jpg')}}" alt="">
				        <h5>Md Alamin</h5>
				        </div>
				       </div>
				       <div class="modal-body" id="HeaderModalBody">
				       		<ul class="headerNavRow">
				       			<li class="modalProfileItem">
				       				<a href="{{url('/admin/profile')}}" id="adminProfileId"><i class="fas fa-user"></i>Profile</a>
				       			</li>
				       			<li class="modalProfileItem">
				       				<a href="{{url('/admin/logout')}}" id="adminLogoutId"><i class="fa fa-sign-out"></i>Logout</a>
				       			</li>
				       		</ul>	
				       </div>
				     </div>
				   </div>
				 </div>
				 

				
