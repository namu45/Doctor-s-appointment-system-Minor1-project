<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        


    <title>All Doctors</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-X  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        body{
            background-color: paleturquoise;
        }
    </style>
    
    
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>

                

                 <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings  menu-active menu-icon-settings-active">
                        <a href="doctors.php" class="non-style-link-menu  non-style-link-menu-active"><div><p class="menu-text">All Doctors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="book.php" class="non-style-link-menu"><div><p class="menu-text">Book Appointment</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                        <td width="13%" >
                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:150px;font-weight: 600;">Doctors Details</p>
                                           
                    </td>
                    
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $patientrow = $database->query("select  * from  patient;");
                                $doctorrow = $database->query("select  * from  doctor;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>




<?php include("../connection.php") ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details</title>
</head>
<body>
    
<div class="doc-detail">

<table>
<thead>
                        <tr>
                        <!-- <th class="table-headin">
                             S.N
                                
                                </th> -->
                                <th class="table-headin">
                                Doctor Name
                                
                                </th>
                                <th class="table-headin">
                                    Email
                                </th>
                                <th class="table-headin">
                                    
                                    Specialities
                                    
                                </th>
                                <th class="table-headin">
                    
                                    phone Number
                                    </th>
                                    
                                </tr>
                        </thead>
                        <tbody>
                          <?php 

$query="SELECT * FROM doctor";
$result=mysqli_query($conn,$query);



$i=1;
while($data=mysqli_fetch_assoc($result))
{
    $spec=$data['specialties'];
    $query1="SELECT sname FROM specialties where id='$spec'";
$result1=mysqli_query($conn,$query1);
$data1=mysqli_fetch_assoc($result1);
$sname=$data1['sname'];
$name=$data['docname'];
$email=$data['docemail'];
$phone=$data['doctel'];
?>
<tr>

<td scope="row"><?php echo $name; ?></td>
<td scope="row"><?php echo $email; ?></td>
<td scope="row"><?php echo $sname;?></td>
<td scope="row"><?php echo $phone; ?></td>
</tr>
<?php
$i++;
}
                          ?> 
                        </tbody>
</table>
</div>


</body>
</html>








<?php
// Retrieve form data
if(isset($_POST['check']))
{
 $name=$_POST['name'];
 $gender=$_POST['gender'];
 $sname=$_POST['sname'];
 $email=$_SESSION['user'];
$docname = $_POST["doctor"];
$date = $_POST["date"];
$time = $_POST["time"];


// Check if the selected time slot is already booked
$sql_check = "SELECT * FROM appointments WHERE date='$date' AND time='$time'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {

  
  // If the slot is already booked, display an error message
  // echo "Sorry, the selected time slot ($time) on $date is already booked. Please choose another time.";
  echo "
  <script>
alert('Sorry, the selected time slot ($time) on $date is already booked. Please choose another time.');
</script>"; 
} else {
 
  // If the slot is available, insert the appointment into the database
  $sql_insert = "INSERT INTO appointments(name, gender, specialties,email, doctor, date, time)  VALUES ('$name', '$gender', '$sname','$email', '$docname', '$date', '$time')";
$result=mysqli_query($conn,$sql_insert);


if($result)
{
  // echo "Booked successful.";
  echo "
  <script>
alert('Your Appointment is Booked Successfully!!');
window.location.href='appointment1.php';
</script>"; 


}
else{
  echo "try again";
}
}
}