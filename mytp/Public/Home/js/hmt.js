// JavaScript Document
$(function(){
	
	//计算内容上下padding
	reContPadding({main:"#main",header:"#header",footer:"#footer"});
	function reContPadding(o){
		var main = o.main || "#main",
			header = o.header || null,
			footer = o.footer || null;
		var cont_pt = $(header).outerHeight(true),
			cont_pb = $(footer).outerHeight(true);
		$(main).css({paddingTop:cont_pt,paddingBottom:cont_pb});
	}
	
	//首页列表末项边框清除
	$(".aboutList a:last,.menu li:last .menuLi").css("border","0");
	$(".menu li:last .menuLi").css("border-top","1px solid #deab73");
	
	
	//子分类下拉
	$(".menuicon").toggle(function(){
			$(this).animate({right:"46%"},300);
			$(this).siblings(".menu").animate({right:"0"},300);
			$('body').addClass('openmenu');
		},function(){
			$(this).animate({right:"0"},300);
			$(this).siblings(".menu").animate({right:"-46%"},300);
			$('body').removeClass('openmenu');
		})
		
	$(".menulist li").children(".menulia").click(function(){
		if($(this).parent().hasClass("on")){
			$(this).parent().removeClass("on");
		}else{
			$(this).parent().siblings().removeClass("on");
			$(this).parent().addClass("on");
		}
	})
	
	
});

