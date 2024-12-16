<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Doctors</title>
    <style>
        
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");

    
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
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@gmail.com</p>
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
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="doctors.php" class="non-style-link-menu"><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr>
                <!-- <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                        <a href="doctors.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr> -->
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                        <a href="appointment.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr>
                <!-- <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr> -->
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Users</p></a></div>
                    </td>
                </tr>

            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">
                        <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:150px;font-weight: 600;">Appointments Details</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Kolkata');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                <?php include('../connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

<style>
        .doc-detail {
    max-width: 800px;
    margin: 0 auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

thead th {
    background-color: #007bff;
    color: white;
    padding: 10px;
    text-align: left;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #ddd;
}

tbody td {
    padding: 10px;
}
body{
    background-color: lightcyan;
}
       
  /* #book-section
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
    width: 80%;
    
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

}  */



    </style>
</head>
<body>
<div class="doc-detail">

<table>
<thead>
                       
                                
<th class="table-headin">
                                 S.N
                                
                                </th>
                                <th class="table-headin">
                                 Name
                                
                                </th>
                                <th class="table-headin">
                                    Gender
                                </th>
                                <th class="table-headin">
                                    
                                    Specialities
                                    
                                </th>
                                <th class="table-headin">
                    
                                    Doctor
                                    </th>
                                    <th class="table-headin">
                    
                                    Date
                                    </th>
                                    <th class="table-headin">
                    
                                    Time
                                    </th>
                                    <th class="table-headin">
                    
                                    Booked Time
                                    </th>
                                    <th class="table-headin">
                    
                                    Cancel
                                    </th>
                                    
                                </tr>
                        </thead>
                        <tbody>
                          <?php 

$query="SELECT * FROM appointments";
$result=mysqli_query($conn,$query);



$i=1;
while($data=mysqli_fetch_assoc($result))
{
    $spec=$data['specialties'];
    $query1="SELECT sname FROM specialties where id='$spec'";
$result1=mysqli_query($conn,$query1);
$data1=mysqli_fetch_assoc($result1);

$name=$data['name'];
$gender=$data['gender'];
$specialties=$data['specialties'];
$doctor=$data['doctor'];
$date=$data['date'];
$time=$data['time'];
$booked_time=$data['booked_time'];

?>
<tr>
<td scope="row"><?php echo $i++; ?></td>
<td scope="row"><?php echo $name; ?></td>
<td scope="row"><?php echo $gender; ?></td>
<td scope="row"><?php echo $specialties;?></td>
<td scope="row"><?php echo $doctor; ?></td>
<td scope="row"><?php echo $date; ?></td>
<td scope="row"><?php echo $time; ?></td>
<td scope="row"><?php echo $booked_time; ?></td>
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


</body>
</html>
