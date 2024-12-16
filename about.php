<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Doctor's Appointment System</title>
    <style>
body {
    font-family: Arial, sans-serif;
    /* background-color: #f0f0f0; */
    background-color: antiquewhite;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: antiquewhite;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    color: #333;
}

.info {
    margin-top: 30px;
    padding: 20px;
    border-radius: 5px;
    background-color: antiquewhite;
    position: relative;
}

.info img {
    width: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
}

.info p {
    color: #555;
    margin-bottom: 20px;
    font-size: 18px;
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

/* Apply animation to info section */
.info {
    animation: fadeInUp 0.5s ease;
    animation-fill-mode: both;
}

/* Emoji styling */
.info p:last-child {
    font-size: 30px;
}


    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>
        <div class="info">
            <img src="sss.jpg" alt="Doctor" class="doctor-img">
            <p>Welcome to Doctor's Appointment System! 🏥</p>
            <p>We are dedicated to providing a seamless experience for patients and healthcare providers alike. Our platform allows patients to easily book appointments with their preferred doctors, manage their medical history, and receive timely reminders for upcoming appointments.</p>
            <p>Our mission is to improve access to healthcare services and streamline the appointment scheduling process.</p>
            <p>Contact us today to learn more! 📞</p>
        </div>
    </div>
</body>
</html>
