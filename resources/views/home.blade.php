
@extends('layout.app')
@section('title','home')
@section('content')

<div class="hoomRoot" id="particles-js">
	<div class="HomePageDiv">
		<div class="homeHeadingRow">
			<h1>Hi, I am <span class="headingSpan">{{$cvhomeData->name}}</span></h1>
		</div>
		<div class="homeTitleRow">
			<p>{{$cvhomeData->MyText}}</p>
		</div>
		
		<div class="homeSocialRow">
			<ul>
				@foreach($socialKey as $key => $item)
					<li><a href=""><i class="{{$item->icon}}"></i></a></li>
				@endforeach
			</ul>
		</div>
		<div class="homeCvDownLoadRow">
			<button class="btn btnHome"><a href="{{url('/cv')}}"><i class="fa fa-download"></i>Download</a></button>
		</div>
		<div class="homeSpecialRow">
			<div class="proggram">
				<h4>Web Developer</h4>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	//particles for js code
particlesJS('particles-js',
  
  {
    "particles": {
      "number": {
        "value": 250,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides":1
        },
        "image": {
          "src": "../img/admin.jpg",
          "width": 200,
          "height": 200
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 0.4,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 5,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 10,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 230,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "repulse"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 400,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true,
    "config_demo": {
      "hide_card": false,
      "background_color": "#b61924",
      "background_image": "",
      "background_position": "50% 50%",
      "background_repeat": "no-repeat",
      "background_size": "cover"
    }
  }

);



</script>
@endsection