<!-- work as appointment.php -->
<?php
include("../connection.php");
session_start();
$docemail = $_SESSION['user'];
$query = "SELECT * FROM doctor WHERE docemail= '$docemail'";  
$result1=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result1);
$docname=$data['docname'];

?>
<?php include('../connection.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
  #book-section
  {
    width: 100%;
   
  }
#book-head
{
  text-align: center;
  margin: 30px;
  font-size: 30px;
}
  .book-table
  {
    width: 100%;
    
  }
  .book-table table
  {
    width: 100%;
    
  }

  .book-table table th{
    font-size=19px;
  }
  table,
        th,
        td {
            border: 3px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
.book-table table tr{
  height: 90px;

}
.book-table table tr td{
text-align: center;
font-size: 17px;

} 
#delete-btn
{
  width: 80px;
  height: 35px;
  border: black solid 1px;
   background-color: red; 
  color: Black;
}
body{
  background-color: lavenderblush;
}
    </style>
</head>
<td width="13%" >
                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td width="15%">
                              
<body>

<section id="book-section">
    <h1 id="book-head"> My Appointment Details </h1>
    
    <div class="book-table">
<table>
  
  <thead>
<tr>
  <th scope="col">S.N</th>
  <th scope="col">Patient Name</th>
  <th scope="col">Gender</th>
  
  <th scope="col">Date</th>
  <th scope="col">Time</th>
  <th scope="col">message</th>
  <th scope="col">Cancel</th>
</tr>
  </thead>
  <tbody>
<?php

$query="SELECT * FROM appointments WHERE doctor='$docname'";
$result=mysqli_query($conn,$query);
$i=1;
while($data=mysqli_fetch_assoc($result))
{
?>
<tr>
  <td scope="row"><?php echo $i++; ?></td>
  <td scope="row"><?php echo $data['name']; ?></td>
  <td scope="row"><?php echo $data['gender']; ?></td>
  
  <td scope="row"><?php echo $data['date']; ?></td>
  <td scope="row"><?php echo $data['time']; ?></td>
  <td scope="row"><?php echo $data['message']; ?></td>
  <td>
<a href="appointmentdel.php?id=<?php echo $data['patient_id'];?>"><button id="delete-btn">Cancel</button></a>
                </td>  
</tr>
<?php

}
?>
  </tbody>
</table>
</div>
   </section>
   
</body>
</html>