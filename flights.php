<?php
  include "connect.php";
 
  $query = "SELECT AirportName from airports";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $airports = [];
    while ($row = $result->fetch_assoc()) {
        $airports[] = $row['AirportName'];
    }
} else {
    $airports = [];
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hermes Flights</title>
  <link rel="stylesheet" href="styleflights.css">

  
</head>
<body>
      <div class="main">
                <div class="navbar">
                      <div class="icon">
                          <a href="Home.php"><h2 class="logo">HERMES</h2></a>
                          <h5 class="l1">TRAVEL</h5>
                      </div>
                      <div class="menu">
                        <ul>
                             <li><a href="Home.php">HOME</a></li>
                             <li><a href="#" class="flights">FLIGHTS</a></li>
                             <li><a href="hotels.html">HOTELS</a></li>
                             <li><a href="contact.php">CONTACT US</a></li>
                            
                        </ul>
                      </div>
                      <div class="button2">
                      <a href="login.php" id="loginLink"><button class="bt2" type="sumbit" id="lButton" onclick="loginButtonClicked()">Login</button></a>
                      </div>
                      <div class="search">
                       
                        <form>
                          <input class="sr" type="text" placeholder="Search" id="sInput"  required>
                          <button class="bt1" type="submit" id="sButton" onclick="searchButtonClicked()">Search</button>       
                        
                        </form>
                      
                      </div>
                   
                </div>
                
              <div class="box">
              
                    <p>Flights</p>
                
                <div class="box2">
                    
                    <form id="f1">
                                    <select class="dep" size="1" id="dep" required>
                                      <option value="" disabled selected>Departure Airport</option>
                                      <?php
                                        foreach($airports as $airport)
                                        echo "<option value=\"$airport\">$airport</option>"
                                      ?>
                                    </select>
                                    <select class="des" size="1" id="des" required>
                                      <option value="" disabled selected>Destination Airport</option>
                                      <?php
                                        foreach($airports as $airport)
                                        echo "<option value=\"$airport\">$airport</option>"
                                      ?>                                
                                    </select>
                                    <br>
                                    <label for="date" class="labeld">&nbsp;&nbsp; Date&nbsp;&nbsp;</label>
                                    <input type="date" id="date" name="date"class="date" >
                                    <select class="s1" id="roundtrip" required>
                                      <option value="" disabled selected>Trip</option>
                                      <option>RoundTrip</option>
                                      <option>One Way</option>
                                      <option>Multi-City</option>
                                    </select>
                                  <input type="number" min="1" placeholder="How many people?" class="people" id="people" required><br>
                                  <button class="bt3" id="sFlight" type="submit">Book Now</button>
                  </form>
                  
                      
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
                    <br><br>
                  </div>
                  <div class="services">
                    <h3>Our Services</h3><br>
                    <p><a href="#">> Security</a></p><br>
                    <p><a href="#">>Before Travel</a></p><br>
                    <p><a href="#">>Hand Laggage</a></p><br>
                    <p><a href="#">>Cars</a></p>
                  </div>
                 
           </div>
      </div>
      
      <script src="flights.js"></script>
      
</body>
</html>