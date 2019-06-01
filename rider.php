<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carpool</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  color:black;
}

#ride-details{

  margin: 0 auto;
  
}
.driver-details img{
  border-radius: 50%;
  width: 300px;
  height: 300px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-top: 1%;
}
h3{
  color:black;
}

#rider-statistics{
  padding-top: 1%;
   width: 30%;
   display: block;
   margin-left: auto;
   margin-right: auto;
   text-align: center;
}

#rider-statistics img{
  margin: 0 auto;
}

#ride-check{

  color:black;
  display:inline;
  height: 7%;
}

#ride-check div{
  background: lightgrey;
  border:1px solid rgba(220,220,220,0.3);
  width:50%;
  text-align:center;
  display:inline-block;
  float:left;
}

#ride-check h3{
  
    font-size: 14px;
    text-transform: capitalize;
    line-height: 40px;
    margin: 0;  
}

#ride-check h3 i{
  margin-right:12px;
}


#droute div{
  padding-top: 2%;
}

#droute h4{
  padding-top: 1%;
  margin: 0 auto;
  text-align: center;


}

a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 8px;
}

a:hover {
  background-color:#3ec7c0
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
  font-size: 3em;
  float:left;
  border:none;
  background:none;
}






</style>


</head>

<body>

<div id="ride-details-content">

  <div class="app-heading">
    <a href="app.php" class="previous"><h1>&laquo; </h1></a>
        <h3>Ride Details</h3>    
    </div><!--app-heading-->
  <div class="driver-details">
    <?php 
    session_start();
    echo "<img src="."'".$_SESSION['imageURL']."'".">";
     ?>
  </div>
  <div id="rider-statistics">
    <?php 
        echo "<h3>".$_SESSION['dest-user']."</h3>";
     ?>
     <img width="70%" height="50%" src="images/riders/ratings.png"/>
  </div>
<!--   <div id="view-profile">
    <input type="submit" value="View Profile"/>
  </div> -->
<!--   <div id="ride-reserve">
    <form method='POST' action=''>
      <input type='submit' value="Reserve">
    </form>

  </div>

  <div id='ride-favourite'>

      <form method='POST' action=''>
      <input type='submit' value="Favourite">
    </form>
    
  </div> -->

  <div id="droute">
    <div class="drouteOne">
      <?php 
      echo "<h4><strong><i class='fas fa-location-arrow'><b> Destination: ".$_SESSION['dest-rider']."</b></i></strong></h4>";
      echo "<h4> <strong><i class='far fa-calendar-alt'> <b>Date:</b></i></strong>".$_SESSION['dest-depart']."</h4>";
       ?> 

    <h4> <strong><i class="fas fa-map-pin"> Distance:</i> </strong> 12km </h4>
    <h4> <strong><i class="far fa-money-bill-alt"> <b>Amount:</b> </i></strong> Rs.120 </h4>
  </div>

  </div>
      
    

    <div id="rider-map">
    </div> 


</div>
    
    
<script>
      function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('rider-map'), {
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
</script>
    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd9imb8mtCzzma_Xqmnt4tNPe02hNdNr4&libraries=places&callback=initMap" async defer></script>

</body>
</html>
