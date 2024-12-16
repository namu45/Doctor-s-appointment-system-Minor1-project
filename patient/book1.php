<!-- work as book1.php -->
<?php include("../connection.php") ;
 $name=$_GET['name'];
     $gender=$_GET['gender'];
     $sname=$_GET['sname'];
     session_start(); 
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment System</title>
  <style>
   *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }


    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
    }

    header {
      text-align: center;
      margin-bottom: 30px;
    }

    header h1 {
      font-size: 28px;
      color: #333;
      margin-bottom: 10px;
    }

    header p {
      font-size: 16px;
      color: #666;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      
    }

   .form-group {
      margin-bottom: 20px;
    }
    .form-group1 {
     margin: 10px;
     text-align: center;
     font-family: 'Baloo 2', cursive;
    
     
    }
    .form-group1 label, .form-group label{
        text-align: center;
        font-family: 'Baloo 2', cursive;
    }
    .form-group1 input
    {
height: 30px;
margin: 10px;
 font-size: 19px;
 text-align: center;
     font-family: 'Baloo 2', cursive;
    
     
    }
    label {
      font-size: 18px;
      color: #333;
      margin-bottom: 5px;
      display: block;
      text-align: left;
    }

    select,
    input[type="date"],
    input[type="time"] {
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 100%;
    }

    button {
      padding: 10px 20px;
      font-size: 18px;
      color: #fff;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #0056b3;
    }

    footer {
      margin-top: 30px;
      text-align: center;
      display: none; /* Hide footer by default */
    }

    footer a {
      color: #007bff;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

   .logout-btn {
      margin-top: 20px;
    }
    body{
      background-color: plum;
    }
  </style>
</head>
<body>
 
<div class="container">
    
    <main>
      <form id="appointmentForm" action="#" method="post">
      <div class="form-group1">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"  value="<?php echo $name; ?>" required>
        </div>
        <div class="form-group1">
          <label for="name">Gender</label>
          <input type="text" id="name" name="gender"  value="<?php echo $gender; ?>" required>
        </div>
        <div class="form-group1">
          <label for="name">speciality</label>
          <input type="text" id="name" name="sname" value="<?php echo $sname; ?>" required>
        </div>
        <div class="form-group">
          <label for="doctor">Select Doctor:</label>
          <select id="doctor" name="doctor" required>
            <option  disabled selected>select</option>
            <!-- Doctors added manually for each department -->
            <?php
           $query="SELECT id FROM specialties WHERE sname='$sname'";
    $result=mysqli_query($conn,$query); 
       $data=mysqli_fetch_assoc($result);
        $sid=$data['id'];
        $query1="SELECT * FROM doctor WHERE specialties='$sid'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_num_rows($result);
if($row=0)
{
echo "no doctor available";
}
else
{
    ?>
      <optgroup label="<?php echo $sname; ?>">
      <?php
    while($data1=mysqli_fetch_array($result1))
    {

$docname=$data1['docname'];
    ?>
   
     <option><?php echo $docname; ?></option>
      <?php     
}
$i++;
    }

     ?>
            </optgroup>
            <?php

            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="date">Select Date:</label>
          <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="time">Select Time:</label>
          <input type="time" id="time" name="time" required>
        </div>
        <div class="form-group">
          <button type="submit" id="bookBtn" name="check">Book Appointment</button>
        </div>
      </form>
    </main>
    
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
