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
        // print_r($_POST);
        // extract($_POST);
        
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $pass = $_POST['password'];
        $con_pass = $_POST['confirm_password'];
        $ph_num = $_POST['ph_number'];
        $email = $_POST['email'];
       
        $insert_details="insert into owner_details(owner_id,first_name,last_name,password,confirm_password,ph_number,email)
         values (NULL,'$fname','$lname','$pass','$con_pass',
         '$ph_num','$email')";  
        
        $result_query=mysqli_query($conn,$insert_details);
        if($result_query){
            echo "<script>alert('Successfully inserted')</script>";
            
        } 

    ?>
