<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointment System Services</title>
   <style>
    body {
    font-family: Arial, sans-serif;
    background-color:white;
    background-image: url('img/ser.jpg');
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: lightblue;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
   

h1 {
    color: #333;
}

.service {
    margin-bottom: 30px;
    padding: 20px;
    border-radius: 5px;
    background-color: #f9f9f9;
    transition: transform 0.3s ease;
}

.service:hover {
    transform: scale(1.05);
}

.service h2 {
    color: #555;
    font-size: 24px;
    margin-bottom: 10px;
}

.service p {
    color: #777;
}

/* Keyframes for animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Apply animation to services */
.service {
    animation: fadeInUp 0.5s ease;
    animation-fill-mode: both;
    background-color: lightblue;
}

   </style>

</head>
<body>
    <div class="container">
        <h1>Our Services</h1>
        <div class="service">
            <h2>Online Appointment Booking</h2>
            <p>Book appointments with your preferred doctors online, hassle-free.</p>
        </div>
        <div class="service">
            <h2>Reminder Notifications</h2>
            <p>Receive timely reminders for your upcoming appointments.</p>
        </div>
        <div class="service">
            <h2>Doctor Search</h2>
            <p>Find the right doctor based on specialty, location, and availability.</p>
        </div>
        <div class="service">
            <h2>Medical History Management</h2>
            <p>Access and manage your medical history securely.</p>
        </div>
    </div>
</body>
</html>
