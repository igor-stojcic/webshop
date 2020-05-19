let backToTopBtn = document.querySelector('.backBtn'); // BACK TO TOP BUTTON ANIMATE
let dropDownBtn = document.querySelectorAll('.dropdown-btn');//-Blog page dropdown btn
let dropUpBtn = document.querySelectorAll('.dropup-btn');//-Blog page dropup btn
let sliderJuice = document.querySelectorAll("#slider-fresh-juices-card .card");//-Home page JUICE SLIDER


//  TOOLTIP for footer nav-link
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();

});
// *****************************************************************************

// *********************** BACK TO TOP *****************************************
window.onscroll = function() {
	animateElement();
}
function animateElement() {
	let currentScrollPos = window.pageYOffset;
	//BACK TO TOP BUTTON
	if (currentScrollPos > 600) {
		backToTopBtn.style.display = "block";
	}
	else if (currentScrollPos < 600) {
		backToTopBtn.style.display = "none";
	}
}
// *****************************************************************************

// ************************ NUMBER SPINNER *************************************
$(document).on('click', '.number-spinner button', function (e) {
	 
	let btn = $(this),
		oldValue = btn.closest('.number-spinner').find('input').val().trim(),
		newVal = 0;
	
	if (btn.attr('data-dir') == 'up') {
		newVal = parseInt(oldValue) + 1;
	} else {
		if (oldValue > 1) {
			newVal = parseInt(oldValue) - 1;
		} else {
			newVal = 1;
		}
	}
	btn.closest('.number-spinner').find('input').val(newVal);
});
// *****************************************************************************

//****************** ADMIN INPUT FILE UPLOAD IMAGE *****************************
$(document).ready(function(){
    // input plugin
    bsCustomFileInput.init();
    // get file and preview image
    $("#inputGroupFile").on('change',function(){
        let input = $(this)[0];
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $("#inputGroupFile2").on('change',function(){
        let input = $(this)[0];
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview2').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});
// *****************************************************************************

// **************** navbar ABOUT and CONTACT make ACTIVE ***********************
$.fn.isInViewport = function() {
  let elementTop = $(this).offset().top;
  let elementBottom = elementTop + $(this).outerHeight();

  let viewportTop = $(window).scrollTop();
  let viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {
  
    if ($('#about-as').isInViewport()) {
      $('#about-as-is-active').addClass('active');
      
    } else {
      $('#about-as-is-active').removeClass('active');
    }

    if ($('#contact').isInViewport()) {
    	$('#contact-is-active').addClass('active');
    } else {
      $('#contact-is-active').removeClass('active');
    }
});
// *****************************************************************************

// ******** BLOG page - hide/block dropdown btn ********************************
for (let i = 0; i < dropDownBtn.length; i++) {
  dropDownBtn[i].addEventListener('click',hideBtn);
  dropUpBtn[i].addEventListener('click',showBtn);
}
function hideBtn() {
  this.style.display = 'none';
}
function showBtn(e) {
  this.parentNode.parentNode.previousElementSibling.children[0].children[1].style.display = 'block';
  this.parentNode.parentNode.previousElementSibling.children[0].children[1].focus();
}
// *****************************************************************************

// ****** JUICE CARD SHAKE AND VIBRATE *****************************************
for (let i = 0; i < sliderJuice.length; i++) {
  sliderJuice[i].addEventListener('mouseover',shakeJuice);
  sliderJuice[i].addEventListener('mouseout',vibrateJuice);
  sliderJuice[i].addEventListener('touchstart',touchShakeJuice);
  sliderJuice[i].addEventListener('touchend',touchVibrateJuice);
}

function shakeJuice(e) {
  this.style.webkitAnimationName = 'shake';
}

function vibrateJuice(e) {
  this.style.webkitAnimationName = '';
}
let tempPositionTouch = '';
function touchShakeJuice(e) {
  this.style.webkitAnimationName = '';
  tempPositionTouch = e.changedTouches[0].screenY;
}

function touchVibrateJuice(e) {
  if (e.changedTouches[0].screenY == tempPositionTouch) {
    this.style.webkitAnimationName = 'shake';
    window.navigator.vibrate(30);
  }
}
// *****************************************************************************

// ********** SCROLL POSITION AFTER RELOAD page ********************************
(function($){
  window.onbeforeunload = function(e){    
    window.name += ' [' + location.pathname + '[' + $(window).scrollTop().toString() + '[' + $(window).scrollLeft().toString();
  };
  $.maintainscroll = function() {
    let parts = window.name.split('[');
    if( parts[parts.length - 3] == location.pathname ){
      window.name = $.trim(parts[0]);
      window.scrollTo(parseInt(parts[parts.length - 1]), parseInt(parts[parts.length - 2])); 
    }
  };  
  $.maintainscroll();
})(jQuery);
// *****************************************************************************
