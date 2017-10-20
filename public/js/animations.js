$(document).ready(function(){
	$(".content-slider-catalogo").flexslider({
			animation: "slide",
		    animationLoop: false,
		    itemWidth: 210,
		    itemMargin: 5,
		    minItems: 2,
		    maxItems: 4,
			controlNav: false,
			move:1
		});
	var sliderTop= $(".content-slider-top").flexslider({
			animation:"slider",
			controlNav: false
		});
	setTimeout(function(){ 
	sliderTop.resize();
	},300);
	$(window).bind('resize', function() { 
	   setTimeout(function(){ 
	       var slider = $('.flexslider').data('flexslider');   
	       slider.resize();
	   }, 500); 
	});
});
	 function initMap() {
        var uluru = {lat: -34.604022,  lng:-58.383715};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru,
          disableDefaultUI: true
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }