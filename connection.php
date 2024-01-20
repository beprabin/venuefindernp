<?php
// Create connection
$conn = new mysqli("localhost", "root", "","venuefindernp");

// Check connection
if (!$conn) {
    die(mysqli_error($con));
}
?> 