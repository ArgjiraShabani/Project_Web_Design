<?php
    session_start();
    include "../connect.php";
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../Users/CSS/stylecontact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
   
    <div  class="main">
        <div class="navbar">
            <div class="icon">
                <a href="../HomePage/Home.php"><h2 class="logo">HERMES</h2></a>
                <h5 class="l1">TRAVEL</h5>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../HomePage/Home.php">HOME</a></li>
                    <li><a href="../FlightsHotels/flights.php">FLIGHTS</a></li>
                    <li><a href="../FlightsHotels/hotels.php">HOTELS</a></li>
                    <li><a href="#" class="contact">CONTACT US</a></li>
                </ul>
            </div>
            <div class="button2">
                <?php
                if(isset($_SESSION['Email'])){
                    echo '<a href="logout.php" id="loginLink"><button class="bt2" id="lButton" type="submit" >Logout</button></a>';
                }else{
                    echo '<a href="login.php" id="loginLink"><button class="bt2" id="lButton" type="submit" onclick="loginButtonClicked()">Login</button></a>';
                }
                
                ?>
              </div>
            <div class="search">
                <input class="src" type="text" placeholder="Search" id="sInput">
                <button class="bt1" id="sButton" type="submit" onclick="searchButtonClicked()">Search</button>       
                
            </div>
        </div>
       
        
    <div class="container">
        

        <div class="contact-section">
            
            
          
            <div class="text-overlay">
                
                <h1>Contact Us</h1>
                <h1>Let's plan your next trip!</h1>
                <div class="info">
                    <h2>Address</h2>
                    <p>10000 Bulevardi Bill Klinton,<br>Prishtina,Kosovo</p>
                    <h2>Contact</h2>
                    <p>Telephone: +383 123 456<br>Mobile: 045 987 654<br> Email: <a href="mailto:info@hermes.net">info@hermes.net</a></p>
                    <h2>Office Hours</h2>
                    <p>
                        Monday-Friday: 8am-7pm<br>
                        Saturday: 10am-5pm
                    </p>
                </div>

               
                

        
        </div>
        <div class="message-section">
            <form action="contactfunction.php" method="POST" onsubmit="return contactForm(event)" id="form">
            <p id="error-message" style="color:rgb(162, 30, 30); font-size: 15px;margin-top:10px;
            padding:5px;border:1px solid rgb(162, 30, 30);background-color:#f8d7da;border-radius: 5px;display: none;"></p>
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" class="first_name" name="firstname" placeholder="Enter your first name">
                <label for="lasttname">Last name:</label>
                <input type="text" id="lastname" class="last_name" name="lastname" placeholder="Enter your last name">
                <label for="email">Email:</label>
                <input type="email" id="email" class="email" name="email" placeholder="Enter your email">
                <label for="number">Phone number:</label>
                <input type="tel" id="number" class="number" name="number" placeholder="Enter your phone number">
                <label for="message">Message:</label>
                <textarea name="message" id="message"  placeholder="Enter your message"></textarea>
                <button>Submit</button>
    
    
            </form>

        </div>
    </div>
        
        
    </div>
    

    
    </div>
    <div class="footer">
        <h1>Hermes</h1>
        
                <div class="follow">
                  <h3>Follow us</h3><br>
                  <p><a href="#">Instagram</a></p>
                  <br>
                  <p><a href="#">Facebook</a></p>
                  <br>
                  <p><a href="#">WhatsApp</a></p>
                  <br>
                  <br>
                </div>
                <div class="services">
                  <h3>Our Services</h3><br>
                  <p><a href="#">> Security</a></p><br>
                  <p><a href="#">>Before Travel</a></p><br>
                  <p><a href="#">>Hand Laggage</a></p><br>
                  <p><a href="#">>Cars</a></p>
                </div>
              
      </div>
      
      <script src="contact.js"></script>
</body>
</html>