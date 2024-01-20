<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Venue</title>
</head>
<body>
    <?php
        include('connection.php');
        print_r($_POST);
        extract($_POST);
        echo $venuename;


        // $name = $_POST['venuename'];
        // $location = $_POST['location'];
        // $capacity = $_POST['capacity'];
        // $price = $_POST['price'];
        // $contact = $_POST['contact'];
        // $venuetype = $_POST['venuetype'];
        // $space = $_POST['space'];
        // $parking = $_POST['parking'];

        $insert_venue="insert into ven (venue_name,location,image,
        capacity,price,contact,description,categories,latitude,longitude)
         values ('$venuename','$location','$image','$capacity',
         '$price','$contact','$description','$category','$latitude',
         '$longitude')";  
        // $result = mysqli_query($sql);
        exit();
        if(mysqli_query($con,$sql)){
            echo "Data inserted";
        }
        else{
            echo "Data not inserted";
        }
        mysqli_close($con);
    ?>
