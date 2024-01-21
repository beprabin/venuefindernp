<?php
//including connect file
include('connection.php');
// get products
function getVenue()
{
    global $conn;
    $select_venue = "Select * from ven order by rand() LIMIT 0,6";
    $result_query = mysqli_query($conn, $select_venue);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
        $venue_id = $row['venue_id'];
        $venue_name = $row['venue_name'];
        $location = $row['location'];
        $image = $row['image'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-2'>
                     <div class='card' >
                     <img src='images/" . $image . "' class='card-img-top' alt='...'>
                     <div class='card-body'>
                     <h5 class='card-title'>$venue_name</h5>
                     <p class='card-text'>$price</p>
                 <a href='venuedetails.php?venue_id=$venue_id' class='btn btn-secondary'>View Details</a>
                 </div>
                 </div>
             </div>";
    }

    // condition to check isset or not
    // if(!isset($_GET['location'])){
    //     if(!isset($_GET['latitutide'])){
    //         $select_venue="Select * from ven order by rand() LIMIT 0,6";
    //         $result_query=mysqli_query($con,$select_venue);
    //         // $row=mysqli_fetch_assoc($result_query);
    //         // echo $row['product_title'];
    //         while($row=mysqli_fetch_assoc($result_query)){
    //             $venue_id=$row['venue_id'];
    //             $venue_name=$row['venue_name'];
    //             $location=$row['product_description'];
    //             $image=$row['image'];
    //             $price=$row['price'];
    //             echo "<div class='col-md-4 mb-2'>
    //                 <div class='card' >
    //                 <img src='../images/image' class='card-img-top' alt='...'>
    //                 <div class='card-body'>
    //                 <h5 class='card-title'>$venue_name</h5>
    //                 <p class='card-text'>$price</p>
    //             <a href='' class='btn btn-secondary'>View Details</a>
    //             </div>
    //             </div>
    //         </div>";
    //         }
    //     }
    // }
}

// getting on the basis of location
function getVenueOnLocation(){
    global $conn;
    // condition to check isset or not
    if(isset($_GET['location'])){
            $location=$_GET['location'];
            $select_venue_location="Select * from ven where location=$location";
            $result_query=mysqli_query($conn,$select_venue_location);
            $num_of_rows=mysqli_num_rows($result_query);
            if(!$num_of_rows){
                echo "<h2 class='text-center text-danger'> Use precise Location</h2>";
            }
            else{
                // $row=mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $venue_id = $row['venue_id'];
                    $venue_name = $row['venue_name'];
                    $location = $row['location'];
                    $image = $row['image'];
                    $price = $row['price'];
                    echo "<div class='col-md-4 mb-2'>
                                 <div class='card' >
                                 <img src='images/" . $image . "' class='card-img-top' alt='...'>
                                 <div class='card-body'>
                                 <h5 class='card-title'>$venue_name</h5>
                                 <p class='card-text'>$price</p>
                             <a href='' class='btn btn-secondary'>View Details</a>
                             </div>
                             </div>
                         </div>";
                }
            }
        }
    }

     // searching products
     function searchVenue(){
        global $conn;

    // condition to check isset or not
            if(isset($_GET['search_venue'])){
                $searched_data_value=$_GET['search_data'];
            }
            $search_products="Select * from ven where location like '%$searched_data_value%'";
            $result_query=mysqli_query($conn,$search_products);
            $num_of_rows=mysqli_num_rows($result_query);
                if(!$num_of_rows){
                    echo "<h2 class='text-center text-danger'> Provide Precise location..</h2>";
                }
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $venue_id = $row['venue_id'];
                $venue_name = $row['venue_name'];
                $location = $row['location'];
                $image = $row['image'];
                $price = $row['price'];
                echo "<div class='col-md-4 mb-2'>
                             <div class='card' >
                             <img src='images/" . $image . "' class='card-img-top' alt='...'>
                             <div class='card-body'>
                             <h5 class='card-title'>$venue_name</h5>
                             <p class='card-text'>$price</p>
                         <a href='' class='btn btn-secondary'>View Details</a>
                         </div>
                         </div>
                     </div>";
            }
        }

function getDetails(){
global $conn;
global $latitude ;
global $longitude;
$select_venue = "Select * from ven where venue_id = venue_id";
$result_query = mysqli_query($conn, $select_venue);
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];
while ($row = mysqli_fetch_assoc($result_query)) {
    $venue_id = $row['venue_id'];
    $venue_name = $row['venue_name'];
    $location = $row['location'];
    $image = $row['image'];
    $price = $row['price'];
    $contact = $row['contact'];
    $capacity = $row['capacity'];
    $description = $row['description'];
    $categories = $row['categories'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    echo " <div class='venue-container'>
    <div>
        <img class='venue-image' src='images/" . $image . "'>
    </div>
    <div>
        <div class='venue-info'>
                    <div>
                        <label for='name'>Name:</label>
                        <p id='name'>$venue_name</p> 
                    </div>
                    <div>
                        <label for='location'>Location:</label>
                        <p id='location'>$location</p> 
                    </div>
                    <div>
                        <label for='capacity'>Capacity:</label>
                        <p id='capacity'>$capacity</p>
                    </div>
                    <div>
                        <label for='price'>Price:</label>
                        <p id='price'>NRs.$price</p>
                    </div>
                    <div>
                        <label for='contact'>Contact Number:</label>
                         <p id='contact'>$contact</p>
                    </div>
                    <div>
                        <label for='price'>Indoor/Outdoor:</label>
                        <p id='price'>$categories</p>
                    </div>
        </div>
        <div class='venue-description'>
            <label for='description'>Description:</label>
            <p id='parking'>$description</p>
        </div>
        
    </div>
    <div id='map'></div>
</div>
<script>
        //maps in the form
        var map = L.map('map').setView([$latitude, $latitude], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([$latitude, $longitude], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(event) {
            var markerLatLng = marker.getLatLng();
            document.getElementById('latitude').value = markerLatLng.lat;
            document.getElementById('longitude').value = markerLatLng.lng;
        });
    </script>
";
}
}     
?>