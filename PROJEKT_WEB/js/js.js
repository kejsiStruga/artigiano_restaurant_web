$(document).ready(function()
{  $('.header').fadeIn('100');
	$('#container').fadeIn('100');
	$('.butona').fadeIn('slow');
	$('img').fadeIn('100'); 
		
});
		'use strict';

$(function() {

    //settings for slider
    var width = 720;
    var animationSpeed = 2000;
    var pause = 3000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }
   $slideContainer
        .on('mouseenter', pauseSlider)
        .on('mouseleave', startSlider);
startSlider();
});  
	  
// DATE PICKER
  $(function() {
    $( "#data" ).datepicker({dateFormat: 'yy/mm/dd',
	minDate: 0,
	maxDate: '+1m +2d'
	                              
 });
 });

//funx n men q vizitori(me llog , pallog )te mos 
//shtype enter tek fusha e searchit lart !!!
function stopRKey(e) { 
  var e = (e) ? e : ((event) ? event : null); 
  var node = (e.target) ? e.target : ((e.srcElement) ? e.srcElement : null); 
  if ((e.keyCode == 13) && (node.type=="text"))  {return false;} 
} 
$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
document.onkeypress = stopRKey; 
////////////////////////////////////////////////////////////////
function search(str) {
    if (str.length == 0) { 
        document.getElementById("sugjerime").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sugjerime").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?q=" + str, true);
        xmlhttp.send();
    }
}/////////////////////////////////////////////////////////////////////
//kur duhet t listohen produktet admini

function listoProd(str) {
    if (str == "") {
        document.getElementById("produkti").innerHTML = "";
        return;
    } else { 
            
            xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("produkti").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","listoProdukte1.php?q="+str,true);
        xmlhttp.send();
    }
}
function showPerdorues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
          
            xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","listoPerdorues.php?perdorues="+str,true);
        xmlhttp.send();
    }
}
/*********************************************************************************/
function showPorosi(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
          
            xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","listoPerdorues.php?perdorues="+str,true);
        xmlhttp.send();
    }
}
/*********************************************************************************/



























