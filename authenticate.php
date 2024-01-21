
<?php


$user=$_POST['email'];
$pass=$_POST['password'];
include('connection.php');
$sql="SELECT * FROM owner_details where email='".$user."' AND password='".$pass."'";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
if(mysqli_num_rows($result)!=0){
    session_start();
    $_SESSION['owner_id']=$user;
    header("Location: provider/dashboard.php");
    exit();
}
else{
    echo "<html>
    <head> <script type='text/javascript'>
    function show_alert(){
        alert('invalid username or password!');
    }
    </script>
    </head>";
    echo "<body onload=show_alert()>";
    include('hero.php');
    echo "</body></html>";
    exit();
}
?>
