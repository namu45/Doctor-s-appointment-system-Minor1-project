<!-- <?php

    $database= new mysqli("localhost","root","","appt");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>
 -->
 <?php 
$server_name="localhost";
$user_name="root";
$password="";
$db_name="appt";

$conn=new mysqli($server_name,$user_name,$password,$db_name);

if(!$conn)
{
echo "database not connected";
}
?>