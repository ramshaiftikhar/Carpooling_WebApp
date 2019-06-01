<?php 
session_start();
$_SESSION['message']="";
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Carpool1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<script 
    src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carpool</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="script.js"></script>
<script src="dist\jquery.validate.min.js"></script>

<meta name="viewport" content="width=device-width">


</head>

<body>

<div id="app-content">

  
    
    <div class="btnContent" id="post-div">
      <div class="app-heading">
          <?php  
            echo $_SESSION['message'];
            if (strlen($_SESSION['message'])>0){
              echo"<h3>".$_SESSION['message']."</h3>";
            }
            else{
              echo "<h3>Post</h3>";
            }
            ?>
         </div><!--app-heading-->
         <div id="post-content" class="col-6 col-m2-12">
          <form id="post-ride-form" action="insert.php" method="POST" name="post-ride-form">
          <div id="driver-type">
                  <input type="radio" value= "driver" name="rider-type" id="rider-type1" class="rider-type" />
          <label  for="rider-type1"><img src="images/post-driver.png" /></label>
          <input type="radio" value="passenger" name="rider-type" id="rider-type2" class="rider-type" />
          <label for="rider-type2"><img src="images/post-passenger.png" /></label>
                </div>
                <input type="text" placeholder="From" name="from" id="from"/>
            <input type="text" placeholder="To" name="to" id="to" />
                <input type="text" placeholder="Depart" name="depart" id="depart" onfocus="(this.type='date')" onblur="(this.type='text')"/>

                <div id="ride-type-div">
                  <div id="ride-type-div1">
                      <input type="radio" value ="One time"name="ride-type" id="ride-type1" class="ride-type" checked/>
                        <label for="ride-type1">One-Time</label>
                    </div>
                  <div id="ride-type-div2">
                      <input type="radio" value="Regular" name="ride-type" id="ride-type2" class="ride-type" checked/>
                        <label for="ride-type2">Regular</label></div>
                  </div>
                <input type="submit" onclick="changeBtn(event,'rider-div');" class="btnBlue colorB1" value="Submit"/>
        </form>
         </div><!--post-content-->

         <div id="post-map" class="myMaps">
                <!--google map goes here-->
                </div>
    </div><!--post-div-->

    <div class="btnContent" id="rides-div">
      <div class="app-heading">
        <h3>Rides</h3>
        </div><!--app-heading-->
         <div id="rides-tabs">
          <a class="tabs-ride-link activeRide" onclick="changeRideTab(event,'list-tab')">
            <!--<i class="fa fa-list" aria-hidden="true"></i>-->
                <h4>List</h4>
            </a>
            <a class="tabs-ride-link" onclick="changeRideTab(event,'map-tab')">
            <!--<i class="fa fa-map-o" aria-hidden="true"></i>-->
                <h4>Map</h4>
            </a>
         </div><!--rides-tabs-->
         
         <div id="rides-content">
          <div class="ride-tab-content col-6 col-m2-12" id="list-tab">
            <!--ride-->
                <div class="rides-list clearfix">
                    <div class="ride-list-detail">
                      
                      <?php
                        $var01 = $_SESSION['ridertype'];
                        $var02 = $_SESSION['initialLocation'];
                        $var03 = $_SESSION['destination'];
                        $var04 = $_SESSION['depart'];
                        if ($var01=='driver' or $var01==""){
                          $ride_Details= "Select initialLocation, destination, depart, Username, Mobile, Email, picture 
                          From Ride as e, Users as u 
                          Where e.user_id = u.user_id ;";
                          $result = $conn->query($ride_Details);
                          }

                        else{
                          $ride_Details="Select initialLocation, destination, depart, Username, Mobile, Email, picture 
                            From Ride as e, Users as u 
                            Where (e.user_id=u.user_id) and (initialLocation='$var02') and (destination='$var03') and (depart = '$var04');";
                          $result = $conn->query($ride_Details);
                      }
                      //will add image field later and display it as well
                      
                      if ($result->num_rows >0){
                        while ($row = $result->fetch_assoc()){
                          echo"<div class='ride-pic'>";
                          $_SESSION['rideDetailsPic']= $row["picture"];
                          echo"<img src="."'".$row["picture"]."'"."/> </a>";
                          echo"</div>";
                        // this while loop would need to move to the next row or create another row record in the same format as the one we have in our "Rides" page. Get me?
                          echo "<div class='dp-info'>";
                          echo "<h5>";
                          echo"<span>From: </span>"." ".$row["initialLocation"];
                          echo"</h5>";
                          echo"<h5>";
                          echo"<span>To:  </span>".$row["destination"];
                          echo"</h5>";
                          echo "<h5>";
                          echo"<span>Date: </span>".$row["depart"];
                          echo"</h5>";
                          echo"<h5>";
                          echo"<span>Name: </span> ".$row["Username"];
                          echo"</h5>";
                          echo"<h5>";
                          echo"<span>Contact:</span>(+92)".$row["Mobile"];
                          echo"</h5>";
                          echo "<h5>";
                          echo"<span>Email:</span>".$row["Email"];
                          echo"</h5>";
                          echo"</br>";
                          echo "<h5>";
                          echo "<form method='POST' action='rideDetails.php' >";

                          $email = $row["Email"];
                          $dest = $row["destination"];
                          $date = $row["depart"];
                          $user = $row["Username"];
                          $init = $row["initialLocation"];
                          $pic = $row['picture'];
                          $mob = $row["Mobile"];
                          echo "<input type='hidden' name ='ride-id' value='$email'>";
                          echo "<input type='hidden' name ='ride-dest' value='$dest'>";
                          echo "<input type='hidden' name ='ride-depart' value='$date'>";
                          echo "<input type='hidden' name ='ride-user' value='$user'>";
                          echo "<input type='submit' value='View Ride'>";
                          echo "</form>";
                          echo "</h5>";
                          echo "<h5>";
                          echo "<form action='favourite.php' method='POST'>";
                          echo "<input type='submit' value='Favourite'>";

                          echo "<input type='hidden' name ='ride-em' value='$email'>";
                          echo "<input type='hidden' name ='ride-pic' value='$pic'>";
                          echo "<input type='hidden' name ='ride-depart' value='$date'>";
                          echo "<input type='hidden' name ='ride-user' value='$user'>";
                          echo "<input type='hidden' name ='ride-init' value='$init'>";
                          echo "<input type='hidden' name ='ride-mob' value='$mob'>";
                          echo "<input type='hidden' name ='ride-dest' value='$dest'>";

                          echo "</form>";
                          echo "</h5>";
                          echo "<h5>";
                          echo "<form action = 'reserve.php' method='POST'>";
                          echo "<input type='hidden' name ='ride-id' value='$email'>";
                          echo "<input type='hidden' name ='ride-dest' value='$dest'>";
                          echo "<input type='hidden' name ='ride-depart' value='$date'>";
                          echo "<input type='hidden' name ='ride-init' value ='$init'>";
                          echo "<input type='submit' value='Reserve'>";
                          echo "</form>";
                          echo "</h5>";
                          echo "</div>";
                          echo "</br>";
                          //echo "<img src='".$row["image"]."'/>";
                        }

                      }
                      else{
                        echo "<div class='error'><h1 align='center'><strong>No rides available!</strong></h1></div>";
                      } 
                      ?>

                      
                    </div>

                      <!--<div class="ride-fare">
                      <h4><?php echo (rand(1,1000))?> km</h4>
                        <h4>Rs.<?php echo(rand(100,4000))?></h4>
                    </div> !-->
                </div> 
                
                <!--ride-->
                
                
                <!--ride-->
                
            
            </div><!--list-tab-->
         
          <div class="ride-tab-content col-6 col-m2-12" id="map-tab">
            <div id="rides-map" class="myMaps">
                <!--google map goes here-->
                </div>
          </div><!--map-tab-->
         </div><!--rides-content-->
    </div>
    
    <div class="btnContent" id="favourites-div">
      <div class="app-heading">
          <h3>Favourites</h3>

         </div>
         <div id="rides-tabs">
          <a class="tabs-ride-link activeRide" onclick="changeRideTab(event,'list-tab')">
            <!--<i class="fa fa-list" aria-hidden="true"></i>-->
                <h4>List</h4>
            </a>
            <a class="tabs-ride-link" onclick="changeRideTab(event,'map-tab')">
            <!--<i class="fa fa-map-o" aria-hidden="true"></i>-->
                <h4>Map</h4>
            </a>
         </div><!--rides-tabs-->
         <div id="rides-content">
          <div class="ride-tab-content col-6 col-m2-12" id="list-tab">
            <!--ride-->
                <div class="rides-list clearfix">
                    <div class="ride-list-detail">
                      
                    <?php
                        $var01 = $_SESSION['ridertype'];
                        $var02 = $_SESSION['initialLocation'];
                        $var03 = $_SESSION['destination'];
                        $var04 = $_SESSION['depart'];
                        $user_id = $_SESSION['user_id'];

                        $sql = "SELECT * FROM Favourite WHERE user_id = '$user_id'";
                        $result = $conn->query($sql);
                      //   if ($var01=='driver' or $var01==""){
                      //     $ride_Details= "Select initialLocation, destination, depart, Username, Mobile, Email, picture 
                      //     From Ride as e, Users as u 
                      //     Where e.user_id = u.user_id ;";
                      //     $result = $conn->query($ride_Details);
                      //     }

                      //   else{
                      //     $ride_Details="Select initialLocation, destination, depart, Username, Mobile, Email, picture 
                      //       From Ride as e, Users as u 
                      //       Where (e.user_id=u.user_id) and (initialLocation='$var02') and (destination='$var03') and (depart = '$var04');";
                      //     $result = $conn->query($ride_Details);
                      // }
                      //will add image field later and display it as well
                      
                      if ($result->num_rows >0){
                        while ($row = $result->fetch_assoc()){
                          echo"<div class='ride-pic'>";
                          $_SESSION['rideDetailsPic']= $row["picture"];
                          echo"<img src="."'".$row["picture"]."'"."/> </a>";
                          echo"</div>";
                        // this while loop would need to move to the next row or create another row record in the same format as the one we have in our "Rides" page. Get me?
                          echo "<div class='dp-info'>";
                          echo "<h5>";
                          echo"<span>From: </span>"." ".$row["initialLocation"];
                          echo"</h5>";
                          echo"<h5>";
                          echo"<span>To:  </span>".$row["destination"];
                          echo"</h5>";
                          echo "<h5>";
                          echo"<span>Date: </span>".$row["depart"];
                          echo"</h5>";
                          echo"<h5>";
                          echo"<span>Name: </span> ".$row["Username"];
                          echo"</h5>";
                          echo"<h5>";
                          echo"<span>Contact:</span>(+92)".$row["Mobile"];
                          echo"</h5>";
                          echo "<h5>";
                          echo"<span>Email:</span>".$row["Email"];
                          echo"</h5>";
                          echo"</br>";
                          echo "<h5>";
                          echo "<form method='POST' action='rideDetails.php' >";

                          $email = $row["Email"];
                          $dest = $row["destination"];
                          $date = $row["depart"];
                          $user = $row["Username"];
                          $init = $row["initialLocation"];
                          $pic = $row['picture'];
                          $mob = $row["Mobile"];
                          echo "<input type='hidden' name ='ride-id' value='$email'>";
                          echo "<input type='hidden' name ='ride-dest' value='$dest'>";
                          echo "<input type='hidden' name ='ride-depart' value='$date'>";
                          echo "<input type='hidden' name ='ride-user' value='$user'>";
                          echo "<input type='submit' value='View Ride'>";
                          echo "</form>";
                          echo "</h5>";
                          echo "</div>";
                          echo "</br>";
                          //echo "<img src='".$row["image"]."'/>";
                        }

                      }
                      else{
                        echo "<div class='error'><h1 align='center'><strong> No Favourites  yet !</strong></h1></div>";
                      } 


                      ?>

                      
                    </div>

                      <!--<div class="ride-fare">
                      <h4><?php echo (rand(1,1000))?> km</h4>
                        <h4>Rs.<?php echo(rand(100,4000))?></h4>
                    </div> !-->
                </div> 
                
                <!--ride-->
                
                
                <!--ride-->
                
            
            </div><!--list-tab-->
         
          <div class="ride-tab-content col-6 col-m2-12" id="map-tab">
            <div id="rides-map" class="myMaps" style="display:block; ">
                <!--google map goes here-->
                </div>
          </div><!--map-tab-->
         </div><!--rides-content-->

         <!--app-heading-->
    </div><!--favourites-div-->
    <div class="btnContent clearfix" id="settings-div">
      <div class="app-heading">
          <h3>Settings</h3>
         </div><!--app-heading-->
         <div id="profile-info-bg" class="profile-bg">
         </div>
         <div id="profile-info" class="profile-details" class="clearfix">
          <?php 
          $user_id = $_SESSION['user_id'];
          $sql= "SELECT * FROM Users WHERE user_id=$user_id";
          $result = mysqli_query($conn, $sql) or die("Could not execute query: " .mysqli_error($conn));
          $row = mysqli_fetch_assoc($result);
          $url = $row['picture'];
          $user= $row['Username'];
          echo "<img src="."'".$url."'".">";
          echo "<h4>".$user."</h3>";
           ?>
          <h5><img src="images/riders/ratings.png" /></h5>

         </div>
         <div id="account-options">
          <div>
              <h4>Wallet<i class="fa fa-angle-right" aria-hidden="true"></i></h4>
                <h4>My Rides<i class="fa fa-angle-right" aria-hidden="true"></i></h4>
                <h4>Edit Account<i class="fa fa-angle-right" aria-hidden="true"></i></h4>
            </div>
            <form method="get" action="index.php">
            <input type="submit" class="btnBlue colorB1" value="Log out"/>
          </form>
         </div><!--account-optins-->
    </div><!--settings-div-->
    
</div><!--app-content-->

<div id="bottom-nav">
    
    <div class="bottom-nav-div">
      <a class="bottom-nav-btn btnActive" onclick="changeBtn(event,'post-div')">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
          <span class="bottom-nav-text">Post</span>
      </a>
    </div><!--bottom-nav-div-->
    <div class="bottom-nav-div">
      <a href="#ride" class="bottom-nav-btn" onclick="changeBtn(event,'rides-div')">
          <i class="fa fa-car" aria-hidden="true"></i>
          <span class="bottom-nav-text">Rides</span>
      </a>
    </div><!--bottom-nav-div-->
    
    <div class="bottom-nav-div">
      <a class="bottom-nav-btn" onclick="changeBtn(event,'favourites-div')">
          <i class="fa fa-star" aria-hidden="true"></i>
          <span class="bottom-nav-text">Favourites</span>
      </a>
    </div><!--bottom-nav-div-->
    
    <div class="bottom-nav-div">
      <a class="bottom-nav-btn" onclick="changeBtn(event,'settings-div')">
          <i class="fa fa-cog" aria-hidden="true"></i>
          <span class="bottom-nav-text">Settings</span>
      </a>
    </div><!--bottom-nav-div-->
    
</div><!--bottom-nav-->

<script>
function changeBtn(evt, btnName) {
    // Declare all variables
    var i, btnContent, btnLinks;
  
   // Get all elements with class="tabcontent" and hide them
    btnContent = document.getElementsByClassName("btnContent");
    for (i = 0; i < btnContent.length; i++) {
        btnContent[i].style.display = "none";
    }

    // Get all elements with class="bottom-nav-btn" and remove the class "active"
    btnLinks = document.getElementsByClassName("bottom-nav-btn");
    for (i = 0; i < btnLinks.length; i++) {
        btnLinks[i].className = btnLinks[i].className.replace(" btnActive", "");
    }

    // Show the current btn, and add an "btnActive" class to the button that opened the tab
    document.getElementById(btnName).style.display = "block";
    evt.currentTarget.className += " btnActive";
}

$myTab=0;
function changeRideTab(evt, tabName) {

 
    // Declare all variables
    var i, rideContent, rideLinks;
  
   // Get all elements with class="ride-tab-content" and hide them
    rideContent = document.getElementsByClassName("ride-tab-content");
    for (i = 0; i < rideContent.length; i++) {
        rideContent[i].style.display = "none";
    }

    if(tabName=="list-tab")
    {
      $myTab=0;
    }
    else
    {
      $myTab=1;
    }

    // Get all elements with class="bottom-nav-btn" and remove the class "active"
    rideLinks = document.getElementsByClassName("tabs-ride-link");
    for (i = 0; i < rideLinks.length; i++) {
        rideLinks[i].className = rideLinks[i].className.replace(" activeRide", "");
    }

    // Show the current btn, and add an "btnActive" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " activeRide";
  }
setInterval(function(){
 if($(window).width()>600)
 {
  var i, rideContent; 
    rideContent = document.getElementsByClassName("ride-tab-content");
    for (i = 0; i < rideContent.length; i++) {
        rideContent[i].style.display = "block";
    }
 }
else
{
 var rideContent = document.getElementsByClassName("ride-tab-content");
  for (i = 0; i < rideContent.length; i++) {
        rideContent[i].style.display = "none";
    }
    rideContent[$myTab].style.display="block";
 
}
  },500);



</script>

<script>
  
      function initMap() {
        // Styles a map in night mode.
      {
        var map = new google.maps.Map(document.getElementById('rides-map'), {
          center: {lat: 40.674, lng: -73.945},
          zoom: 12,
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
        });
      }
        {
         var map = new google.maps.Map(document.getElementById('post-map'), {
          center: {lat: 40.674, lng: -73.945},
          zoom: 12,
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
        });
       }
      }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd9imb8mtCzzma_Xqmnt4tNPe02hNdNr4&libraries=places&callback=initMap"></script>

</body>
</html>
