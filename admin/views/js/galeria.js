//area del arrastre de imagenes

if($("#lightbox").html() == 0){
	$("#lightbox").css({"height":"100px"});
}else{
	$("#lightbox").css({"height":"auto"});
}

$("body").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();
});

$("#lightbox").on("dragover", function(e){
	e.preventDefault();
	e.stopPropagation();

	$("#lightbox").css({"background":"url(views/images/pattern.jpg)"});
});

$("body").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

});

var imagenSize = [];
var imagenType = [];

$("#lightbox").on("drop", function(e){

	
		
})