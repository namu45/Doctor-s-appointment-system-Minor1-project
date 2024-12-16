<?php require('../connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>appointment cancel</title>
</head>
<body>
<?php
if(isset($_GET['id']))
{
    $id=$_GET["id"];
    $query="DELETE FROM appointments WHERE patient_id='$id'";
    $result=mysqli_query($conn,$query);
    header('location:index.php');
}

?>
</body>
</html>