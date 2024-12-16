
<!-- work as book.php -->
<?php include("../connection.php") ;?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment System</title>
  <style>

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
    main
    {
        border: 1px solid black;
        width: 40%;
        margin: auto;
        height: 350px;
        padding: 30px;
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
.form-group input{
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
    #submit-query
    {
        border: 1px solid black;
        width: 80%;
        margin: auto;
        margin-top: 20px;
        
    }
    #submit-query:hover{
        background-color: lavender;
        border-radius:10px;
    }
    #submit-heading
    {
        text-align: center;
        font-family: 'Baloo 2', cursive;
        font-size: 19px;
    }
body{
  background-color: plum;
}

  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Welcome to Doctor Appointment System</h1>
     
      <p>Please fill the form below</p>
    </header>
    <main>
      <form id="appointmentForm" action="book1.php" method="get">
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
          <select id="specialties" name="sname" required>
            <option value="" disabled selected>Select Specialties</option> 
            <?php 

    $query1="SELECT sname FROM specialties";
$result1=mysqli_query($conn,$query1);

while($data1=mysqli_fetch_assoc($result1))
{
$sname=$data1['sname'];
            ?>
            <option><?php echo $sname; ?></option>
          <?php
          $i++;
}
?>
</select>
        </div>
        <div class="form-group">
          <button type="submit" id="bookBtn" name="check">Check Doctors</button>
        </div>
      </form>
    </main>
    
  </div>

<?php 
if(isset($_GET['check']))
{
$sename=$_GET['sname'];
$query="SELECT id FROM specialties WHERE sname='$sename'";
$result=mysqli_query($conn,$query); 
$data=mysqli_fetch_assoc($result);
$sid=$data['id'];
$query1="SELECT * FROM doctor WHERE specialties='$sid'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_num_rows($result1);
if($row==0)
{  
echo "
<script>
alert('No Doctor is available in this department');
</script>"; 
header('location:book2.php');
}
else
{
    
    echo "
<script>
alert(' Doctor is available in this department please submit the form below');
</script>";
?> 
    <div id="submit-query">
        <h1 id="submit-heading">Please Submit This Query</h1>
<form id="appointmentForm" action="book12.php" method="get">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"  value="<?php echo $_GET['name']; ?>"required>
        </div>
       
        <div class="form-group">
          <label for="name">Gender:</label>
          <input type="text" id="gender" name="gender"  value="<?php echo $_GET['gender']; ?>"required>
        </div>
       
        <div class="form-group">
          <label for="name">Specialties</label>
          <input type="text" id="specialties" name="sname"  value="<?php echo $_GET['sname']; ?>"required>
        </div>
           
        <div class="form-group">
          <button type="submit" id="bookBtn" name="check">Submit data</button>
        </div>
      </form></div>
    <?php
}
}
?>
  
</body>
</html>

