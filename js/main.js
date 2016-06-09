/**
*Exampe from http://kottenator.github.io/jquery-circle-progress/

var progressBarOptions = {
	startAngle: -1.55,
	size: 100,
    value: 0.75,
    fill: {
		color: '#FC5A2F'
	}
}

$('.circle').circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
	$(this).find('stron').text(String(stepValue.toFixed(2)).substr(1));
});

$('#circle-b').circleProgress({
	value : 0.25,
	fill: {
		color: '#000'
	}
});

$('#circle-c').circleProgress({
	value : 0.80,
	fill: {
		color: '#FC5A2F'
	}
});*/

//cursos js
$(function(){

        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: true,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }

//botoon hamugueesa
$(document).ready(function(){
    $(".button a").click(function(){
        $(".overlay").fadeToggle(200);
       $(this).toggleClass('btn-open').toggleClass('btn-close');
    });
});
$('.overlay').on('click', function(){
    $(".overlay").fadeToggle(200);   
    $(".button a").toggleClass('btn-open').toggleClass('btn-close');
    open = false;
});

//video about-me
    $(function(){
        $("video").hover(function(){
            this.play();
        }
        ,function(){
           this.pause()
        });
    });
