<nav class=" navbar-expand-lg navbar-light">
  <di class="navImgDiv">
      <div class="navImgDiv d-none">
      <img id="HomeNavberImg" src="" alt="">
      <h4 id="AdminName"></h4>
    </div>
    <div class="loader">
      <span class='spinner-border text-primary spinner-border-sm loaderSpan' role='status' aria-hidden='true'></span> Loading...
    </div>
    <div class="nothingImg d-none">
      <h3>Nothing Image..</h3>
    </div>
  </di>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbarUl">
      <li> <a class="nav-item nav-link" href="{{url('/')}}">Home</a></li>
      <li><a class="nav-item nav-link" href="{{url('/about')}}">About</a></li>
      <li> <a class="nav-item nav-link" href="{{url('/resume')}}">Resume</a></li>
      <li><a class="nav-item nav-link" href="{{url('/blog')}}">Blog</a></li>
      <li><a class="nav-item nav-link" href="{{url('/potfulio')}}">Potfulio</a></li>
      <li><a class="nav-item nav-link" href="{{url('/contact')}}">Contact</a></li>
      <li><a class="nav-item nav-link" href="{{url('/login')}}">Login</a></li>
    </ul>
  </div>
  <div class="navFooter">
    <p>&copy;alamin</p>
  </div>
</nav>