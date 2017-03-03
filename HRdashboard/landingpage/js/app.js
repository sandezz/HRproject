$(document).ready(function(){

	/* Content appear */
	if($('body').hasClass('content-appear')) {
		$('body').addClass('content-appearing')
		setTimeout(function() {
			$('body').removeClass('content-appear content-appearing');
		}, 800);
	}
	
	/* Particles */
	particlesJS("particles", {
	  "particles": {
	    "number": {
	      "value": 30,
	      "density": {
	        "enable": true,
	        "value_area": 800
	      }
	    },
	    "color": {
	      "value": "#ffffff"
	    },
	    "shape": {
	      "type": "circle"
	    },
	    "opacity": {
	      "value": 0.5,
	      "random": false,
	      "anim": {
	        "enable": false,
	        "speed": 1,
	        "opacity_min": 0.1,
	        "sync": false
	      }
	    },
	    "size": {
	      "value": 3,
	      "random": true,
	      "anim": {
	        "enable": false,
	        "speed": 40,
	        "size_min": 0.1,
	        "sync": false
	      }
	    },
	    "line_linked": {
	      "enable": false
	    },
	    "move": {
	      "enable": true,
	      "speed": 1,
	      "direction": "none",
	      "random": false,
	      "straight": false,
	      "out_mode": "out",
	      "bounce": false,
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
	        "mode": "grab"
	      },
	      "onclick": {
	        "enable": true,
	        "mode": "push"
	      },
	      "resize": true
	    }
	  },
	  "retina_detect": true
	});

	/* Parallax */
	$('#scene').parallax({
		limitX: 30,
		limitY: 30,
		scalarY: 0,
   		frictionX: 0.05,
		frictionY: 0,
		originY: 0,
	});

	/* Menu Anchors */
	$('a.anchor').click(function() {
		if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
			var $target = $(this.hash);
			$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				$('html,body').animate({scrollTop: targetOffset - 70}, 1000);
				return false;
			}
		}
	});

});