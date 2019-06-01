$(document).ready(function(){
	setInterval(function(){
	$(".myCarousel").each(function(index){
	if(($(this).width()>0)){
	var length=$(".myCarousel").length-1;
	switch(index){	
		case length:
		$(this).css("width","0%");
		$(".myCarousel").first().css("width","100%");
		$(".myCircles").first().css("color","black");	
		$(".myCircles").last().css("color","white");
		break;
		default:
		$(this).css("width","0%");
		$(this).next().css("width","100%");
		$(".myCircles").eq(index).css("color","white");
		$(".myCircles").eq(index).next().css("color","black");
		break;
	}
}
});

	},5000);


$("#rightArrow").click(function(){
$(".myCarousel").each(function(index){
if(($(this).width()>0)){
	var length=$(".myCarousel").length-1;
	switch(index){	
		case length:
		$(this).css("width","0%");
		$(".myCarousel").first().css("width","100%");
		$(".myCircles").first().css("color","black");	
		$(".myCircles").last().css("color","white");
		break;
		default:
		$(this).css("width","0%");
		$(this).next().css("width","100%");
		$(".myCircles").eq(index).css("color","white");
		$(".myCircles").eq(index).next().css("color","black");
		break;
	}
}
});
});

$("#leftArrow").click(function(){
$(".myCarousel").each(function(index){
if(($(this).width()>0)){
	switch(index)
	{
		case 0:
		$(this).css("width","0%");
		$(".myCarousel").last().css("width","100%");
		$(".myCircles").first().css("color","white");	
		$(".myCircles").last().css("color","black");
		break;
		default:
		$(this).css("width","0%");
		$(this).prev().css("width","100%");
		$(".myCircles").eq(index).css("color","white");
		$(".myCircles").eq(index).prev().css("color","black");

		break;
	}
}
});
});

	
	
	$myColorValue1=$(".colorA2").css("color");
	$myColorValue2=$(".colorA1").css("color");
	$myColorCounter=2;
	$("#nav-bar ul li a").mouseenter(function(){
		$(this).addClass("colorA1");
		if($(this).hasClass("colorA3"))
		{
			$(this).removeClass("colorA3");	
		}

	});
	$("#nav-bar ul li a").mouseleave(function(){
		$(this).addClass("colorA3");
		if($(this).hasClass("colorA1"))
		{
			$(this).removeClass("colorA1");	
		}

	});
	
	$("#menuDiv2 ul li").mouseenter(function(){
		$(this).addClass("colorB1");
		if($(this).hasClass("colorB3"))
		{
			$(this).removeClass("colorB3");	
		}

	});
	$("#menuDiv2 ul li").mouseleave(function(){
		$(this).addClass("colorB3");
		if($(this).hasClass("colorB1"))
		{
			$(this).removeClass("colorB1");	
		}

	});
	$("#menuDiv2 ul li").mouseenter(function(){
		$(this).find("a").addClass("colorA3");
		if($(this).find("a").hasClass("colorA1"))
		{
			$(this).find("a").removeClass("colorA1");	
		}

	});
	$("#menuDiv2 ul li").mouseleave(function(){
		$(this).find("a").addClass("colorA1");
		if($(this).find("a").hasClass("colorA3"))
		{
		$(this).find("a").removeClass("colorA3");	
		}

	});

	
		
	$("#email-div,#phone-div,#location-div,#connect-div").each(function(){
		$(this).mouseenter(function(){
			$(this).css("box-shadow","box-shadow: 0 0 0 10px #167481")
		$(this).addClass("colorB1");
		if($(this).hasClass("colorB3"))
		{
			$(this).removeClass("colorB3");	
		}
		});
	});
	$("#email-div,#phone-div,#location-div,#connect-div").each(function(){
		$(this).mouseleave(function(){
		$(this).addClass("colorB3");
		if($(this).hasClass("colorB1"))
		{
			$(this).removeClass("colorB1");	
		}
		});
	});

	$(".close").on("mouseenter,focus",function(){
		$(this).addClass("colorA1");
		if($(this).hasClass("colorA2"))
		{
			$(this).removeClass("colorA2");	
		}
	});
	$(".close").on("mouseleave,blur",function(){
		$(this).addClass("colorA2");
		if($(this).hasClass("colorA1"))
		{
			$(this).removeClass("colorA1");	
		}
	});
	$("#pickupInp input").focus(function(){
		$(this).addClass("colorA1");
		if($(this).hasClass("colorA2"))
		{
			$(this).removeClass("colorA2");	
		}
	});
	$("#pickupInp input").blur(function(){
		$(this).addClass("colorA2");
		if($(this).hasClass("colorA1"))
		{
			$(this).removeClass("colorA1");	
		}
	});

	$(".mySkins").click(function(){
		$myColorValue1=$(this).css("background-color");
		$myColorCounter=1;
	});
	$(".myFonts").click(function(){
		$myColorValue2=$(this).css("background-color");
		$myColorCounter=2;
	});
	$(".inputbox").each(function(){
		$(this).focus(function(){
		$(this).addClass("colorA1");
		if($(this).hasClass("colorA2"))
		{
		$(this).removeClass("colorA2");
		}
		});
	});
	$(".inputbox").each(function(){
		$(this).blur(function(){
		$(this).addClass("colorA2");
		if($(this).hasClass("colorA1"))
		{
		$(this).removeClass("colorA1");
		}
		});
    });
	
	var visible=false;
    $("#colorChartIcon").click(function(){
		if($(window).width()>600){
		if(visible==false){
    		$("#colorDiv").animate({left: '0'},500);
			visible=true;
		}
		else{
			$("#colorDiv").animate({left: '-280px'},500);
			visible=false;
		}
		}
		else
		{
		if(visible==false){
    		$("#colorDiv").animate({left: '0'},500);
			visible=true;
		}
		else{
			$("#colorDiv").animate({left: '-200px'},500);
			visible=false;
		}
			
		}
	});


	setInterval(function(){
	$(".colorB2").css("background-color",$myColorValue1);
	$(".colorB3").css("background-color","white");
	$(".colorA2").css("color",$myColorValue1);
	$(".colorA2").css("border-color",$myColorValue1);
	$(".colorA2").css("box-shadow",$myColorValue1);
	$(".colorA3").css("color","white");
	$(".colorA3").css("border-color","white");
	$(".colorA3").css("box-shadow","white");	
	$(".colorA1").css("color",$myColorValue2);
	$(".colorA1").css("border-color",$myColorValue2);
	$(".colorA1").css("box-shadow",$myColorValue2);	
	$(".colorB1").css("background-color",$myColorValue2);
	$(".colorB3").css("background-color","white");
	$(".colorA3").css("color","white");
	$(".colorA3").css("border-color","white");
	$(".colorA3").css("box-shadow","white");
},0);


$(function() {
	
  $("form[name='contactForm']").validate({
    rules: {
      name:{ 
	  required: true,
	  minlength: 4
	  },
      email: {
        required: true,
        email: true
      },
      suggestions:{
      	required:true,
      	minlength:15
      }

    },
    messages: {
      name: {
        required: "Please enter your first name",
        minlength: "Name must be at least 4 characters long"
      },
      email: "Please enter a valid email address"
    ,
    suggestions:{
        required: "Please enter a suggestion",
        minlength: "Suggestions must be at least 15 characters long"
      }
  },
    submitHandler: function(form) {
      form.submit();
  		}
});
  $("form[name='post-ride-form']").validate({
    rules: {
      from:{ 
	  required: true
	  },
      to: {
        required: true
      },
      depart:{
      	required:true,
      	dateOnly:true
      	}

    },
    messages: {
      from: {
        required: "Please enter a valid pickup location"
      },
      to:{
      required: "Please enter a valid destination"
  }
    ,
    depart:{
        required: "Please enter a departure time",
       
      }
  },
    submitHandler: function(form) {
      form.submit();
  		}
});
$("form[name='loginForm']").validate({
  rules:
  {
  	user:{
  		required:true,
  		minlength:4
  	},
  	pwd:{
  		required:true,
  		minlength:8
  	},
  	retype:{
  		required:true,
  		minlength:8,
  		equalTo:"#pwd"
  	}
  },
  messages:
  {
	user: {
        required: "Please enter your full name",
        minlength: "Name must be at least 4 characters long"
      },
      pwd: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
	  retype:{
		 required: "Please retype your password",
       	 equalTo: "Passwords don't match. Retype your password"
	  }
    },
    submitHandler: function(form) {
      form.submit();
  }
});
$("form[name='signUpForm']").validate({
  rules:
  {
  	name:{
  		required:true,
  		minlength:4
  	},
  	email:{
		required:true,
		email:true
  	},
  	mNumber:{
  		required:true	
  	},
  	pwd:{
  		required:true,
  		minlength:8
  	},
  	retype:{
  		required:true,
  		minlength:8,
  		equalTo:"#signUpPwd"
  	}
  },
  messages:
  {
	name: {
        required: "Please enter a username",
        minlength: "Name must be at least 4 characters long"
      },
      pwd: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
	  retype:{
	   	 minlength: "Your password must be at least 8 characters long",
		 required: "Please retype your password",
       	 equalTo: "Passwords don't match. Retype your password"
	  },
	  mNumber:{
	  	required:"Please enter your mobile number"
	  },
	  email:"Please enter a valid email address"
    },
    submitHandler: function(form) {
      form.submit();
  }
});
});
})