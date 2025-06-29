<?php
session_start();
include "../connect.php";

  

    $query = "SELECT HotelName from hotels";
  
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $hotels = [];
        while ($row = $result->fetch_assoc()) {
            $hotels[] = $row['HotelName'];
        }
    } else {
        $hotels = [];
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $hotel=$_POST['hotel'];
        $checkin=$_POST['checkin'];
        $checkout=$_POST['checkout'];
        $guests=$_POST['guests'];
        $rooms=$_POST['rooms'];

        $stmt = $conn->prepare("SELECT * FROM hotels WHERE HotelName = ?");
        $stmt->bind_param("s", $hotel); 
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
          if ($row['HotelName'] == $hotel) {
             
              $hotel_id = $row['ID'];
          }
        }


    if($checkin>$checkout){
      echo "<script>alert(\"Kontrolloni daten e rezervimit!\");</script>";
    }else{

    $insert_stmt = $conn->prepare("INSERT INTO hotelbook (HotelID, CheckIn, CheckOut, Rooms, Guests ) VALUES (?, ?, ?, ?, ?)");
    $insert_stmt->bind_param("sssss", $hotel_id, $checkin, $checkout, $rooms, $guests);

    if (!$insert_stmt->execute()) {
      die('Error executing insert statement: ' . $insert_stmt->error);
    }
    $insert_stmt->close();
  }


  
   
  $conn->close();
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="CSS/stylehotels.css">

<style>
.box {
    flex-direction: row;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    margin-top: 200px;
    height: 49vh;
    justify-content: center;
    background: rgba(172, 172, 172, 0.3);
}

.box h1 {
    font-weight: 100;
    padding-top: 55px;
    padding-bottom: 20px;
    color: #ffffff;
    font-size: 40px;

}

.f1 {
    justify-content:space-around;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    
    
}
label{
    font-weight: bold;
    color: #ffffff;
    font-size: larger;
}
.dep {
    padding: 10px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    width: 250px;
    height: 50px;
    outline: none;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.6);

}

input[type="date"], .guests, .rooms {
    padding: 10px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    width: 250px;
    height:50px ;
    outline: none;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.6);
    
}

.b {
    width: 250px;
    height: 50px;
    font-size: 1rem;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.6);
    color: rgb(0, 0, 0);
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

@media (max-width: 768px){
    .navbar{
        flex-direction: column;
        align-items: center;
        gap: 20px;
      }
      .navbar .menu ul{
        flex-direction: column;
        gap: 15px;
        justify-content: center;
        align-items: center;
    
      }
      .navbar .search input{
        width: 75px;
      }
      .footer{
        flex-direction: column;
        text-align: center;
        gap: 20px;
      }
    }
  @media(max-width: 480px){
        .navbar{
          flex-direction: column;
          align-items: center;
          gap: 10px;
        }
        .navbar .menu ul{
          flex-direction: column;
          align-items: center;
          gap: 10px;
        }
        .navbar .search input{
          width: 90%;
        }
        .box2{
          margin-bottom: 150px;
        }
      
        .footer{
          flex-direction: column;
          gap: 15px;
          text-align: center;
          margin-top: 50px;
        }
       
       input,button{
            max-width: 100%;
        }
        }
    </style>
  
   
</head>
<body>
  
    <div class="main">
        <div class="navbar">
            <div class="icon">
              <a href="../HomePage/Home.php"><h2 class="logo">HERMES</h2></a>
              <h5 class="l1">TRAVEL</h5>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../HomePage/Home.php">HOME</a></li>
                    <li><a href="flights.php">FLIGHTS</a></li>
                    <li><a href="#" class="hotel">HOTELS</a></li>
                    <li><a href="../Users/contact.php">CONTACT US</a></li>
                </ul>
                
            </div>
            <div class="button2">
              
              <?php
                        if(isset($_SESSION['Email'])){
                            echo '<a href="../Users/logout.php" id="loginLink"><button class="bt2" id="lButton" type="submit" >Logout</button></a>';
                        }else{
                            echo '<a href="../Users/login.php" id="loginLink"><button class="bt2" id="lButton" type="submit" onclick="loginButtonClicked()">Login</button></a>';
                        }
                        
                    ?>
            </div>
            <div class="search">
                <form>
                <input class="sr" type="text" placeholder="Search" id="sInput" required>
                <button class="bt1" type="submit" id="sButton" onclick="searchButtonClicked()">Search</button>      
                </form>
            </div>
      </div>
    
       
        <div class="box">
            
               <h1>Find the Right Hotel</h1>
            
          
                <form id="f1" method="POST" class="f1">
                 
                   
                
                    <label for="check-in">Check-in:</label>
                    <input type ="date" id="check-in" name="checkin" required >

                    <label for="check-out">Check-out:</label>
                    <input type="date" id="check-out" name="checkout" required>
                   
                    <select class="dep" size="1" id="des" required name="hotel">
                    <option value="" disabled selected>Hotels</option>
                    <?php
                             foreach($hotels as $hotel){
                                echo "<option value=\"$hotel\">$hotel</option>";
                              }
                    ?>                   
                  </select>

                    <input type="number" min="1" placeholder="Guests" class="guests" id="guests" name="guests" required>
                    <input type="number" min="1" placeholder="Rooms" class="rooms" id="rooms" name="rooms" required>

                    
                    <button type="submit" class="b">Book</button>
                    
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
       <script src="hotels.js"></script>
</body>
</html> 
