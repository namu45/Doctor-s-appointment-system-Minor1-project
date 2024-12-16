<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment System</title>
  <style>
    /* styles.css */
    /* Reset CSS */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
    }

   .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Welcome to Doctor Appointment System</h1>
      <p>Book your appointment hassle-free!</p>
      <p>Please select the department, doctor, date, and time for your appointment.</p>
    </header>
    <main>
      <form id="appointmentForm" action="#" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="specialties">Select Specialties:</label>
          <select id="specialties" name="specialties" required>
            <option value="" disabled selected>Select Specialties</option>
            <option value="cardiology">Cardiology</option>
            <option value="dermatology">Dermatology</option>
            <option value="neurology">Neurology</option>
            <option value="orthopedics">Orthopedics</option>
          </select>
        </div>
        <div class="form-group">
          <label for="doctor">Select Doctor:</label>
          <select id="doctor" name="doctor" required>
            <option value="" disabled selected>Select Doctor</option>
            <!-- Doctors added manually for each department -->
            <optgroup label="Cardiology">
              <option value="Dr. Baburam Bhatarrai">Dr. Baburam Bhatarrai</option>
              <option value="Dr. Budhi Bahadur Thapa">Dr. Budhi Bahadur Thapa</option>
            </optgroup>
            <optgroup label="Dermatology">
              <option value="Dr. Sudarshan Subedi">Dr. Sudarshan Subedi </option>
              <option value="Dr. Pratima Bista">Dr. Pratima Bista</option>
            </optgroup>
            <optgroup label="Neurology">
              <option value="Dr. Goma Tulachan">Dr. Goma Tulachan</option>
              <option value="Dr. Bhagirath Baniya">Dr. Bhagirath Baniya</option>
            </optgroup>
            <optgroup label="Orthopaedics">
              <option value="Dr. Reena Shrestha">Dr. Reena Shrestha </option>
              <option value="Dr. Shraddha Baniya">Dr. Shraddha Baniya</option>
            </optgroup>
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
          <button type="submit" id="bookBtn" name="submit">Book Appointment</button>
        </div>
      </form>
    </main>
    
  </div>

  
</body>
</html>

<?php
// Connect to database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Retrieve form data
if(isset($_POST['submit']))
{
 
$name = $_POST["name"];
$gender = $_POST["gender"];
$specialties = $_POST["specialties"];
$doctor = $_POST["doctor"];
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
  $sql_insert = "INSERT INTO appointments(name, gender, specialties, doctor, date, time)  VALUES ('$name', '$gender', '$specialties', '$doctor', '$date', '$time')";

//   if ($conn->query($sql_insert) === TRUE) {
//     // Appointment booked successfully, display alert message and redirect to view-appointments.php
//     echo "<script>alert('Appointment booked successfully!'); 
//     window.location.href = 'view-appointments.php';</script>";
//   } else {
//     echo "Error: ". $sql_insert. "<br>". $conn->error;
//   }
// }
// }

$result=mysqli_query($conn,$sql_insert);
if($result)
{

  // echo "Booked successful.";
  echo "
  <script>
alert('Your Appointment is Booked Successfully!!');
</script>"; 
// header('location:viewappointment.php');
}
else{
  echo "try again";
}
}
}
// Close the database connection
$conn->close();
?>
