<?php 
session_start();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
  
  <title>Carpool</title>
  <link rel="icon" href="images/favicon.png" type="image/gif" sizes="16x16" />
  <link type="text/css" rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
  <script src="script.js"></script>
  <script src="dist\jquery.validate.min.js"></script>
  <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript">  </script>



<script>
$(document).ready(function(){
  
  $('#nav-icon2').click(function(){
    $(this).toggleClass('open');
  });

    
  $("#colorChartIcon").mouseenter(function(){
    $("#tooltip-colorscheme").css("display","block");
  });
  
  $("#colorChartIcon").mouseleave(function(){
    $("#tooltip-colorscheme").css("display","none");
  });
  
  //scrolling effect
  var navHeight = $('nav').outerHeight();
    $('nav a').click(function() {
      if (location.pathname == this.pathname && location.hostname == this.hostname) {
          var $target = $(this.hash);
          $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOff = $target.offset().top;
        $('html,body')
        .animate({scrollTop: targetOff - navHeight}, 1000);
      }
    }
  });
  
  
  //Check to see if the window is top if not then display button
  $(window).scroll(function()
  {
    if($(window).width()>1100){
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
    if ($(this).scrollTop() > 700) {
      $('#header').css('position','fixed').animate({'top' : '0px'}, 500);
    } else {
      $('#header').css('position','absolute');
    }
  }
  else{
  $("#header").css("position","absolute");
  }
  });
  //Click event to scroll to top
  $('.scrollup').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
    });
  
});


</script>

<script>
function checkUsername(value) {
  
  var exists=false;
  var path="http://127.0.0.1:8080/userdata.json";
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {  
  if (this.readyState == 4 && this.status == 200) {
    result = JSON.parse(this.responseText);
      for (var i=0; i<result.length; i++){
        var object = result[i];
      if(value==object.name){
      exists=true;
      break;
      }
    }
    if(exists==true){
      alert("username already exists exists")
      document.getElementById("signUpName").value=""; 
    }
    
  }
  }
  xhttp.open("GET", path, true);
  xhttp.send();
  
};

function checkmNumber(value) {
  
  var exists=false;
  var path="http://127.0.0.1:8080/userdata.json";
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {  
  if (this.readyState == 4 && this.status == 200) {
    result = JSON.parse(this.responseText);
      for (var i=0; i<result.length; i++){
        var object = result[i];
      if(value==object.mobile){
      exists=true;
      break;
      }
    }
    if(exists==true){
      alert("mobile number already exists")
      document.getElementById("signUpNumber").value=""; 
    }
    
  }
  }
  xhttp.open("GET", path, true);
  xhttp.send();

  
};

function checkEmail(value) {
  
  var exists=false;
  var path="http://127.0.0.1:8080/userdata.json";
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {  
  if (this.readyState == 4 && this.status == 200) {
    result = JSON.parse(this.responseText);
      for (var i=0; i<result.length; i++){
        var object = result[i];
      if(value==object.email){
      exists=true;
      break;
    }
    }
    if(exists==true){
      alert("Email already exists")
      document.getElementById("signUpEmail").value="";  
    }
    
  }
  }
  xhttp.open("GET", path, true);
  xhttp.send();
  
};
</script>


<style>
.error{
  color:red;
}




</style>

</head>

<body>
  

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '125422668024920',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('login!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>
<div id="wrapper">
    <div id="header" class="colorB2">
      
        <div id="colorDiv">
          <div id="colorSwitch" >
          <div class="skintext"><p>Skins</p></div>
          <div class="circle mySkins" style="background-color:#25262e"></div>
          <div class="circle mySkins" style="background-color:#2f4f4f"></div>
          <div class="circle mySkins" style="background-color:#490b24"></div>
              <div class="circle mySkins" style="background-color:#073e13"></div>
              <br/>
        
          <div class="skintext"><p>Fonts</p></div>
          <div class="circle myFonts" style="background-color:#1674d1"></div>
              <div class="circle myFonts" style="background-color:#c73e59"></div>
          <div class="circle myFonts" style="background-color:#87c13f"></div>
          <div class="circle myFonts" style="background-color:#e8bd18"></div>
        </div>
            <div id="colorChartIcon">
            <span id="colorChartSpan">
              <img src="images/colorToggler.png" alt="colorToggler">
            </span>
                <span id="tooltip-colorscheme">
                <p>Color Schemes</p>
            </span>
          </div>
          
          
        </div><!--colorDiv-->
        
        
        <div class="container row">
         <div id="logo" class="col-3 col-m-12 col-m2-8">
                <a href="index.html" class="colorA1">
                    <img src="images/logo.png" alt="logo" />
                    <span class="site-logo">
                        <span id="logo-start" class="colorA1">car</span>
                        <span id="logo-end">pool</span>
                    </span>
                </a>
            </div><!--logo-->
        
          <nav id="nav-bar" class="clearfix col-7 col-m-12">
              <div id="menu-div">
                <ul id="nav-menu">
                    <li><a href="#who-we-are">About Us</a></li>
                      <li><a href="#how-it-works">How It Works</a></li>
                      <li><a href="#why-carpool">Why Carpool</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div><!--menu div-->
            </nav>
            
           <div id="loginbtns" class="clearfix col-2">
                <form>
                    <input class="btnBlue colorB1" type="button" onclick="document.getElementById('login-modal').style.display='block';
                    changeTab(event, 'login-tab'); $('#tabLogin').addClass('active');"  value="Login" />
                    <input class="btnBlue colorB1" type="button" onclick="document.getElementById('login-modal').style.display='block';
                    changeTab(event, 'signup-tab');$('#tabSignUp').addClass('active');"  value="Sign Up" />
                </form>
            </div>
            
            <div id="mobileHeader" class="col-m2-4">
            <label id="menuIcon">
                <input type="checkbox" id="myCheckbox">
                <div id="nav-icon2">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
                <!--<i id="menuIcon-bars" class="fa fa-bars fa-2x colorA2" aria-hidden="true"></i>-->
                    <nav id="nav-bar2" >
                        <div id="menuDiv2">
                            <ul>
                            <li class="colorB3"><a class="colorA1" href="#about-us">About Us</a></li>
                            <li class="colorB3"><a class="colorA1" href="#how-it-works">How it Works</a></li>
                            <li class="colorB3"><a class="colorA1" href="#why-carpool">Why Carpool</a></li>
                            <li class="colorB3"><a class="colorA1" href="#contact">Contact Us</a></li>   
                            </ul>        
                        </div>
                    </nav>
            </label>
            </div>
    
        </div><!--container-->
    </div><!--header-->
    
    <div id="banner" class="clearfix" style="padding:0">
    <img src="images/carousel1.jpg" alt="banner-main" class="myCarousel" id="myCarousel1" style="width:100%"/>
        <img src="images/carousel2.jpg" alt="banner-main" class="myCarousel" id="myCarousel2" style="width:0%"/>
        <img src="images/carousel3.jpg" alt="banner-main" class="myCarousel" id="myCarousel3" style="width:0%"/>          
          <button type="button" id="leftArrow">
          <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
        </button>
          <button type="button" id="rightArrow">
            <i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
        </button>
          
      <div id="myText">
        <i class="fa fa-circle myCircles" aria-hidden="true" style="color:black;"></i>
        <i class="fa fa-circle myCircles" aria-hidden="true" style="color:white;"></i>
        <i class="fa fa-circle myCircles" aria-hidden="true" style="color:white;"></i>
      </div>
    </div><!--banner-->

     
     <div id="who-we-are" class="clearfix" style="padding-top:0px;">
      <div id="who-we-are-op">
        <div class="container">
          <div class="row">
            <header class="page-header">
                  <h2>Who We Are</h2>
              </header><!--page-header-->
                <div id="who-we-are-content" class="col-12 col-m-12 col-m2-12">
                <p>An association of certified inhabitants of the university for sharing a common route, not just helping the participants with the economy but also a considerable favor to the commune by improving sustainability of the natural resources and traffic density.</p>
                </div><!--who-we-are-content-->
            </div>
         </div><!--container-->
         </div>
     </div><!--who-we-are-->
     
     
     <div id="what-we-do" class="clearfix">
      <div class="container colorB3">
          <header class="page-header">
                <h2 class="colorA2">What We Do</h2>
            </header><!--page-header-->
            <div class="row">
            <div id="what-we-do1" class="col-6 col-m-12 col-m2-12 what-we-do-content">
              <h4 class="colorA2">Too many cars.</h4>
                    <h4 class="colorA2">So many empty seats.</h4>
          <h4 class="colorA1"><span>Let's fix that.</span></h4>
                </div><!--what-we-do-content-->
                  
                <div id="what-we-do-img1" class="col-6 col-m-12 col-m2-12 what-we-do-img">
                  <img src="images/what-we-do1.jpg" />
                </div><!--what-we-do-img-->
      </div><!--row-->
            <div class="row">
            <div id="what-we-do-img2" class="col-6 col-m-12 col-m2-12 what-we-do-img">
                  <img src="images/what-we-do2.jpg" />
                </div><!--what-we-do-img-->
                <div id="what-we-do2" class="col-6 col-m-12 col-m2-12 what-we-do-content">
              <h5 class="colorA1"><span>3 easy steps to getting unstuck in traffic.</span></h5>
                    
                    <h5 class="colorA2">Get it and set it</h5>
          <p class="colorA2">Tell Carpool where you live and work. Get matched with a fellow Wazer going your way.</p>

          <h5 class="colorA2">Share the ride</h5>
          <p class="colorA2">When it’s time, one Wazer picks up the other and off they go. Carpool Karaoke time.</p>

          <h5 class="colorA2">Share the cost</h5>
          <p class="colorA2">Payment is set in advance based on distance. When the ride is over, Carpool transfers it from rider to driver.</p>
                </div><!--what-we-do-content-->
                  
                
      </div><!--row-->
            <div class="row">
            <div id="what-we-do3" class="col-6 col-m-12 col-m2-12 what-we-do-content">
              <h5 class="colorA1"><span>What's Carpool all about?</span></h5>
          <p style="color:#b6b6b6">It's a simple, quick, cheap and fun way to commute together.</p>

          <h5 class="colorA2">Make a little money, save a little money</h5>
          <p class="colorA2">Commuting is expensive. With Carpool everybody saves.</p>

          <h5 class="colorA2">Get there quicker with the carpool lane</h5>
          <p class="colorA2">With fewer cars clogging the roads, we all get there faster.</p>

          <h5 class="colorA2">It's a win-win-win</h5>
          <p class="colorA2">Make a new friend, help end traffic, make the world a better place.</p>
                </div><!--what-we-do-content-->
                  
                <div id="what-we-do-img3" class="col-6 col-m-12 col-m2-12 what-we-do-img">
                  <img src="images/what-we-do3.jpg" />
                </div><!--what-we-do-img-->
      </div><!--row-->
         </div><!--container-->
     </div><!--about-us-->
       
  <div id="why-carpool" class="clearfix">
        <div class="container" id="why-carpool-Container">
            <header class="page-header colorA2">
                <h2>Why Carpool</h2>
            </header><!--page-header-->
        <div class="row">
            <div class="why-carpool-divs col-4 col-m-6 col-m2-12">
                <img src="images/1.png" alt="brand-teams" />
                <div class="why-carpool-content">
                    <h5 class="colorA1">Split Costs</h5>
                    <p class="colorA2">Riders contribute an amount based on distance.</p>
                </div><!--why-carpool-content-->
            </div><!--why-carpool-divs-->
            
            <div class="why-carpool-divs col-4 col-m-6 col-m2-12">
                <img src="images/2.png" alt="market-teams" />
                <div class="why-carpool-content">
                    <h5 class="colorA1">Connect</h5>
                    <p class="colorA2">Living in the city can be a social experience.</p>
                </div><!--why-carpool-content-->
            </div><!--why-carpool-divs-->
            
            <div class="why-carpool-divs col-4 col-m-6 col-m2-12" id="why-carpool-div-3">
                <img src="images/3.png" alt="sales-teams" />
                <div class="why-carpool-content">
                    <h5 class="colorA1">Reduce Congestion</h5>
                    <p class="colorA2">Help reduce the number of cars on the roads.</p>
                </div><!--why-carpool-content-->
            </div><!--why-carpool-divs-->
         </div> <!--row div -->
            
        </div><!--container-->
    </div><!--why-carpool-->
    
     <div id="how-it-works" class="clearfix">
        <div class="container colorA2">
            
            <div id="how-it-works-box" class="col-12 col-m-12 col-m2-12">
                <header class="page-header">
                    <h2>How It Works</h2>
                </header><!--page-header-->
                
                <div class="row how-it-works-div">
                <div class="how-it-works-content clearfix">
                    <div class="item-image col-6">
                        <img src="images/how-it-works1.png"/>
                    </div><!--item-image-->
                    
                    <div class="item-content col-6">
                        <h5 class="colorA1">Get Started</h5>
                        <p class="colorA2">Download Carpool, and sign up to create an account.</p>
                    </div><!--item-content-->
                </div><!--how-it-works-content-->
                </div>
               
                <div class="row how-it-works-div">
                <div class="how-it-works-content clearfix">
                                        
                    <div class="item-content col-6">
                        <h5 class="colorA1">Request a ride</h5>
                        <p class="colorA2">With just two taps, get matched with a friendly driver!.</p>
                    </div><!--item-content-->
                
                    <div class="item-image col-6">
                        <img src="images/how-it-works2.png"/>
                    </div><!--item-image-->

                </div><!--how-it-works-content-->
                </div>
                
                <div class="row how-it-works-div">
                <div class="how-it-works-content clearfix">
                    <div class="item-image col-6">
                        <img src="images/how-it-works3.png"/>
                    </div><!--item-image-->
                    
                    <div class="item-content col-6">
                        <h5 class="colorA1">Get matched</h5>
                        <p class="colorA2">Carpool’s algorithm matches you based on route, predicted traffic, past feedback, and more. Carpool lets you know your carpool details well in advance so there’s zero stress.</p>
                    </div><!--item-content-->
                </div><!--how-it-works-content-->
                </div>
                
                <div class="row how-it-works-div">
                <div class="how-it-works-content clearfix">
                    
                    <div class="item-content col-6">
                        <h5 class="colorA1">Get the guaranteed fare</h5>
                        <p class="colorA2">Hop out when you reach your destination and we’ll automatically charge the guaranteed fare to the credit card you have on file.</p>
                    </div><!--item-content-->
                
                    <div class="item-image col-6">
                        <img src="images/how-it-works4.png"/>
                    </div><!--item-image-->
                </div><!--how-it-works-content-->
                </div>
                
                <div class="row how-it-works-div">
                <div class="how-it-works-content clearfix">
                    <div class="item-image col-6">
                        <img src="images/how-it-works5.png"/>
                    </div><!--item-image-->
                    
                    <div class="item-content col-6">
                        <h5 class="colorA1">Review your ride</h5>
                        <p class="colorA2">Contribute to the cost of the trip. Share your experience!</p>
                    </div><!--item-content-->
                </div><!--how-it-works-content-->
                </div>
                
            </div><!--how-it-works-box-->
         </div><!--container-->
     </div><!--how-it-works-->
     
      <div id="fare-estimate" class="clearfix colorB1">
        <div class="container blue-div">
            <div class="row">
                <div id="fare-left" class="col-4 col-m-12 col-m2-12">
                    <header class="page-header">
                        <h2>Get a fare estimate</h2>
                    </header><!--page-header-->
                    
                    <div id="fare-estimate-form">
                      <form action=""  method="post" name="fareEstimateForm">
                        <div class="fareInp" id="pickupInp">
                              <img src="images/farepickdrop.png" alt="fare-pick-drop" />
                                <div class="popup" onclick="closeFunction()">
                                  <i role="button" class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
                                  <span class="popuptext" id="myPopup">We will use your Location.</span>
                </div>
                                <input type="text" id="pickupLoc" placeholder="Enter pickup location" required="required">
                                
                            </div>
                            <div class="fareInp" id="destinationInp">
                              <i role="button" class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
                                <input type="text" id="destinationLoc" placeholder="Enter destination" required="required">
                        </div>
                    </form>
                    </div><!--fare--estimate--form-->
                    
                </div><!--fare-left-->
                
                <div id="fare-right" class="col-7 col-m-12 col-m2-12">
                    
                </div><!--fare-right-->
                
            </div>
         </div><!--container-->
     </div><!--fare-estimate-->

    <div id="contact" class="blue-div clearfix">
        <div class="container">
            <header class="page-header colorA2">
                <h2>Contact Us</h2>
            </header><!--page-header-->
            
            <div id="contact-info" class="col-6 col-m-12 col-m2-12 colorA1">
                <div class="contact-info-divs colorB3" id="connect-div">
                    
                    <i class="fa fa-share-alt fa-5x" aria-hidden="true"></i>
                    <h3><span>Connect</span></h3>
                    
                    <div class="connect-divs">
                        <a href="https://www.facebook.com/"><i class="fa fa-facebook fa-3x" aria-hidden="true"></i></a>
                    </div><!--connect-divs-->
                    <div class="connect-divs">
                        <a href="https://twitter.com/login"><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
                    </div><!--connect-divs-->
                    <div class="connect-divs">
                        <a href="https://plus.google.com/"><i class="fa fa-google-plus fa-3x" aria-hidden="true"></i></a>
                    </div><!--connect-divs-->
                    <div class="connect-divs">
                        <a href="https://www.linkedin.com/uas/login"><i class="fa fa-linkedin fa-3x" aria-hidden="true"></i></a>
                    </div><!--connect-divs-->
                   
                </div>
                <div class="contact-info-divs colorB3" id="email-div">
                    <i class="fa fa-envelope fa-5x" aria-hidden="true"></i>
                    <h3><span>Email</span></h3>
                   

                </div>
                <div class="contact-info-divs colorB3" id="location-div">
                    <i class="fa fa-location-arrow fa-5x" aria-hidden="true"></i>
                    <h3><span>Location</span></h3>
                   
                </div>
                <div class="contact-info-divs colorB3" id="phone-div">
                    <i class="fa fa-phone fa-5x" aria-hidden="true"></i>
                    <h3><span>Phone</span></h3>
                   
                </div>
                
                
            </div><!--contact-info-->
            
            <div id="form-div" class="col-6 col-m-12 col-m2-12">
                <div id="form-text" class="colorA2">
                    <p>We'd Love to Hear from You!</p>
                </div><!--form-text-->
                
            <div id="contact-form" method= "post">
                <form action="ContactUs/mail.php" method="post" name="contactForm">
                    <input class="inputbox colorA2" type="text" name="name" id="contactFormName" placeholder="Enter Your Name">
                    <input class="inputbox colorA2" type="text" name="email" id="contactFormEmail" placeholder="Enter your Email">
                    <input class="inputbox colorA2" type="text" name="phoneNo" id="contactFormNo" placeholder="Enter your Phone Number (Optional)">
                    <textarea class="inputbox colorA2" name="suggestions" id="contactFormSuggestions" placeholder="How can we help you ?"></textarea>
                    <input class="btnBlue colorB1" type="submit" value="Send Message"/>
                </form>
            </div><!--contact-form-->
          </div><!--form-div-->
        </div><!--container-->
     </div><!--contact-->
    
    <div id="footer" class="colorB2">
        <div class="container ">
            <div id="copyrights">
                <span class="siteName">carpool ©  2018. All rights reserved.</span><a class="privacy_link colorA1" href="#">Privacy Policy </a>
            </div><!--copyrights-->
        </div><!--container-->
    </div><!--footer-->
       
<!-- The Modal -->
<div id="login-modal" class="modal colorA2">
    
    <div class="tab">
        <input type="button" id="tabSignUp" class="tablinks" onclick="changeTab(event, 'signup-tab')" value="Sign Up"/>
        <input type="button" id="tabLogin" class="tablinks" onclick="changeTab(event, 'login-tab')" value="Login" />

    </div>
    
    <div id="login-tab" class="tabcontent">
    <!-- Modal Content -->
    <form class="modal-content animate" method="POST" action="login.php" name="loginForm">
    <div class="imgcontainer">
        <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="images/logo2.png" alt="userIcon" class="userIcon">
    </div>

    <div class="modal-container colorA2">
      <input type="text" placeholder="Enter Username" name="user" id="user">
      <input type="password" placeholder="Enter Password" name="pwd" id="pwd">
      <p class="error"> <?php if(isset($_GET["error"])){
       echo 'Incorrect password or username' ;
}?></p>
      <input type="submit" class="btnBlue colorB1" value="Login"/>

      <input type="checkbox" checked="checked"> Remember me
      
    </div>

   <!-- <div class="modal-container colorA2" style="background-color:#f3f3f3">
        <span>Forgot <a href="#">password?</a></span>
    </div> !-->
  </form>
  </div><!--login-tab-->
  
 
  <div id="signup-tab" class="tabcontent">
    <!-- Modal Content -->
    
    <form class="modal-content animate" method="post" action="signup.php" name="signUpForm" id="signUpForm">
    <div class="imgcontainer">
        <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="modal-container colorA2">
      <input type="text" placeholder="Username" name="name" id="signUpName" onBlur="checkUsername(value)"/>
      <input type="tel" placeholder="Mobile Number" name="mNumber" id="signUpNumber" onBlur="checkmNumber(value)"/>
      <input type="email" placeholder="Email id" name="email" id="signUpEmail" onBlur="checkEmail(value)"/>
      <input type="password" placeholder="Password"  name="pwd" id="signUpPwd"/>
      <input type="hidden" name="image_url" id= "imgurl" value="">
      <input type="password" placeholder="Retype Password" name="retype" id="retype">
      <input type="submit" id="upload_widget" class="btnBlue colorB1"  value ="Upload your image" />
      <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  
      <script type="text/javascript">  
        var myWidget = cloudinary.createUploadWidget({
          cloudName: 'carpool199', 
          uploadPreset: 'carpool1990'}, (error, result) => { 
            console.log(error,result);
            document.cookie = "url="+result.info.url;
            var url = document.cookie.substring(4);
            document.getElementById('imgurl').value = url;
            // window.localStorage.setItem('url', result.info.url);
          });
        document.getElementById("upload_widget").addEventListener("click", function(){
          // 
            myWidget.open();
            

        }, false);
      </script>
      <p> </p>
      
      <input type="submit" class="btnBlue colorB1" value="Sign Up"/>
     
    </div>
   <!-- <div onclick="login()" class="modal-container fb-button colorA2" style="background-color:#3b5998">
        <img class="fb-img" src="images/fb.png" >
        <p>Sign up with Facebook</p> 
    </div> !-->
  </form>
  </div><!--signup-tab-->
</div>



<a href="#" class="scrollup colorA1"><i class="fa fa-angle-up" aria-hidden="true"></i></a>


<script>
// Get the modal
var modal = document.getElementById('login-modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
function changeTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

</div><!--wrapper-->
<script>
//$(document).ready(function(){
  function closeFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
  }
  
    var map, infoWindow, marker, directionsService, directionsDisplay;
      function initMap() {
        var myLatLng = {lat: -34.397, lng: 150.644};
          map = new google.maps.Map(document.getElementById('fare-right'), {
              center: myLatLng,
              zoom: 6
          });
      
      directionsService = new google.maps.DirectionsService;
          directionsDisplay = new google.maps.DirectionsRenderer;
    
      
      var card = document.getElementById('fare-estimate-form');
          var input = document.getElementById('destinationLoc');
      var input2 = document.getElementById('pickupLoc');
        
          var autocomplete = new google.maps.places.Autocomplete(input);
      var autocomplete2 = new google.maps.places.Autocomplete(input2);

          // Bind the map's bounds (viewport) property to the autocomplete object,
          // so that the autocomplete requests use the current map bounds for the
          // bounds option in the request.
          autocomplete.bindTo('bounds', map);
      autocomplete2.bindTo('bounds', map);

          var infowindow = new google.maps.InfoWindow();
          var infowindowContent = document.getElementById('infowindow-content');
          infowindow.setContent(infowindowContent);
      
      marker = new google.maps.Marker({
          position: myLatLng,
          map: map,

        });
      
      autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              var place = autocomplete.getPlace();
              if (!place.geometry) {
              // User entered the name of a Place that was not suggested and
              // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
              }

              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
              } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);

              var address = '';
              if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                  ].join(' ');
              }

              infowindowContent.children['place-icon'].src = place.icon;
              infowindowContent.children['place-name'].textContent = place.name;
              infowindowContent.children['place-address'].textContent = address;
              infowindow.open(map, marker);
        });
      
      
  }
  
  
   $("#fare-left i:last").click(function(){
   
    directionsDisplay.setMap(map);
    marker.setVisible(false);
    calculateAndDisplayRoute(directionsService, directionsDisplay);
            
   });
   
   function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('pickupLoc').value,
          destination: document.getElementById('destinationLoc').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }


  $("#fare-left i:first").click(function(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position){
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            marker = new google.maps.Marker({
                position: pos,
                map: map,
        
            });
            map.setCenter(pos);
      map.setZoom(17);
      var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
      geocodeLatLng(geocoder, map, infowindow, pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
           })
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
  
  

});
  function geocodeLatLng(geocoder, map, infowindow, pos) {
    var latlng = {lat: pos.lat, lng: pos.lng};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
             
              infowindow.setContent(results[1].formatted_address);
        document.getElementById('pickupLoc').value=results[1].formatted_address;
              
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
    

</script>
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd9imb8mtCzzma_Xqmnt4tNPe02hNdNr4&callback=initMap"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd9imb8mtCzzma_Xqmnt4tNPe02hNdNr4&libraries=places&callback=initMap"></script>



</body>
</html>