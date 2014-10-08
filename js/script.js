// JavaScript Document

jQuery(document).ready(function($) {
	
	var arr = [];
	
	var box_width = $(".box").width();
	var box_height= $(".box").height();
	
	$(".box_post").each(function() {
		var post_id = $(this).attr("id");
		var position = $(this).position();
		var temp = { 
			height: $(this).height(),
			width: $(this).width(),
			top: position.top,
			left: position.left
		}
		arr[post_id] = temp;
	});
	
	$(".box_post").each(function() {
		var key = $(this).attr("id");
		console.log(key);
		$(this).css({
			"position"	: "absolute",
			"width" 	: arr[key].width,
			"heigth"	: arr[key].height,
			"top"		: arr[key].top,
			"left"		: arr[key].left
		});
	});
	
	$(".box").css({ "height" : box_height });
	console.log(arr);
	
	$(".box_post").toggle(function() {
		$(this).animate({
			width 	: box_width,
			height	: box_height,
			top 	: "0",
			left	: "0"
		},"slow","easeInCubic")
		$(".box_post").removeClass("over");
		$(this).addClass("over");
		$(this).find("p").fadeIn("slow");
		$(this).find("p").css({"padding" : "20px"});
		$(this).find("h2").css({"line-height" : "100px"});
	}, function() {
		var id = $(this).attr("id");
		$(this).animate({
			width 	: arr[id].width,
			height	: arr[id].height,
			top 	: arr[id].top,
			left	: arr[id].left	
		},"slow","easeInCubic");
		$(this).find("p").fadeOut("slow");
		$(this).find("h2").css({"line-height" : arr[id].height+"px"});
	});
	
});