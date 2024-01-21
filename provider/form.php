<?php
  include('../connection.php');
  if(isset($_POST['insert_venue'])){
    // isset($_POST['insert_venue'])
    // print_r($_POST);
    // extract($_POST);
     $venue_name=$_POST['venue_name'];
    
    $location=$_POST['location'];
    $description=$_POST['description'];
    $capacity=$_POST['capacity'];
    $contact=$_POST['contact'];
    $price=$_POST['price'];
    $category=$_POST['categories'];
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $user_id = $_SESSION['userid'];


    // $insert_venue="insert into ven (venue_name,location,
    // capacity,price,contact,description,categories,latitude,longitude)
    //  values ('$venue_name','$location','$capacity',
    //  '$price','$contact','$description','$category','$latitude',
    //  '$longitude')";    
    // $result_query=mysqli_query($conn,$insert_venue);

    // print($_POST['capacity']);
    // // accessing images
    $image=$_FILES['image1']['name'];
    
    // accessing image temp name
    $temp_image=$_FILES['image1']['tmp_name'];
    
    // checking empty condition     
    if($venue_name=='' or $location=='' or $image==''or $capacity=='' or $price=='' or $contact=='' or  $description==''or  $category=='' or $latitude=='' or $longitude==''){
        echo "<script>
            alert('Please insert all the filled')
        </script>";
        exit();
    }else{
        move_uploaded_file($temp_image, "../images/$image");
    
        // insert query
        
        //  echo $insert_venue ; exit; 
        $insert_venue="insert into ven (venue_name,location,
        capacity,price,contact,description,categories,latitude,longitude, image,owner_id)
         values ('$venue_name','$location','$capacity',
         '$price','$contact','$description','$category','$latitude',
         '$longitude', '$image','$user_id')";   
        $result_query=mysqli_query($conn,$insert_venue);
        if($result_query){
            echo "<script>alert('Successfully inserted')</script>";
            
        } 
    }   
     unset($_POST['insert_venue']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add your Venue</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../assets/icon.svg" />

  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
  <link
      href="https://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />
  <style>
    .container{
        display: flex;
        padding: 20px;
        align-items: center;
        align-content: center;
        margin-left: 200px;
    }
    form {
      max-width: 600px;
      margin-left: 50px;
    }
    label {
      display: block;
      margin-bottom: 8px;
    }
    #map {
        margin-right: 150px;
        height: 400px;
        width: 600px;
    }
    h3 {
        margin-bottom: 25px;
    }
  </style>
</head>
<body>
<div class="container">
    <div>
        <h3>List your venue in the website:</h3>
        <div id="map"></div>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="venue">Venue:</label>
            <input class="form-control" type="text" id="venue_name" name="venue_name" placeholder="Enter venue name" required>

            <label for="location">Location:</label>
            <input class="form-control" type="text" id="location" name="location" placeholder="Enter event location" required>

            <label for="link">Details about venue:</label>
            <input class="form-control" type="text" id="description" name="description" placeholder="Enter details of Venue" width="200px" height="200px">
            <label for="capacity">Capacity:</label>
            <input class="form-control" type="number" id="capacity" name="capacity" placeholder="Enter event capacity" required>

            <label for="price">Price:</label>
            <input class="form-control" type="text" id="price" name="price" placeholder="Enter event price" required>

            <label for="contact">Contact:</label>
            <input class="form-control" type="text" id="contact" name="contact" placeholder="Enter event contact information" required><br>

        
            <select class="form-control" name="categories" id="">
                    <option value="">Select a categories</option>
                    <option value="indoor">Indoor</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="both">Both</option>                  
            </select>

            <label for="latitude">Latitude:</label>
            <input class="form-control" type="text" id="latitude" name="latitude" readonly>

            <label for="longitude">Longitude:</label>
            <input class="form-control" type="text" id="longitude" name="longitude" readonly>

            <label for="image1" class="form-label">Images </label>
            <input class="form-control" type="file" name="image1" id="image1" class="form-control" required="required">
          
            <input type="submit" name="insert_venue" class="btn btn-success md-3 px-3" value="Insert Venue">
            <!-- <button type="submit" name="insert_venue" onclick="insert_venue">Submit</button> -->
        </form>
    </div>
    
</div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>

    //maps in the form
    var map = L.map('map').setView([27, 85], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([27.715141756723987, 85.31158447265625], { draggable: true }).addTo(map);

    marker.on('dragend', function (event) {
        var markerLatLng = marker.getLatLng();
        document.getElementById('latitude').value = markerLatLng.lat;
        document.getElementById('longitude').value = markerLatLng.lng;
    });
   
</script>
</body>
</html>
