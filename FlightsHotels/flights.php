<?php
session_start();
  include "../connect.php";
  
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

 $query2= "Select TripName from trip";
 $result2=$conn->query($query2);

 if ($result2->num_rows > 0) {
  $tripType = [];
  while ($row = $result2->fetch_assoc()) {
      $tripType[] = $row['TripName'];
  }
} else {
  $tripType = [];
}


?>
<?php

$destination ="";
$departure = "";
$dateDep="";
$people=0;
$trip="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
  $destination = $_POST['destination'];
  $departure = $_POST['departure'];
  $dateDep=$_POST['dateDep'];
  $people=$_POST['people'];
  $trip=$_POST['trip'];

  
$stmt = $conn->prepare("SELECT * FROM airports WHERE AirportName = ? OR AirportName = ?");
$stmt->bind_param("ss", $destination, $departure); 
$stmt->execute();
$result = $stmt->get_result();

$dep_id = null;
$destination_id = null;

while ($row = $result->fetch_assoc()) {
    if ($row['AirportName'] == $destination) {
       
        $destination_id = $row['AirportID']; 
    }

    if ($row['AirportName'] == $departure) {
       
        $dep_id = $row['AirportID']; 
    }

}
$trip_stmt = $conn->prepare("SELECT * FROM trip WHERE TripName = ?");
$trip_stmt->bind_param("s", $trip);
$trip_stmt->execute();
$trip_result = $trip_stmt->get_result();
$trip_id = null;
if ($trip_result->num_rows > 0) {
  
    $row = $trip_result->fetch_assoc();
    $trip_id = $row['TripID'];
}

$trip_stmt->close();

    $insert_stmt = $conn->prepare("INSERT INTO flight (DepID, ArrivalID, Depature_date, People, TripID ) VALUES (?, ?, ?, ?, ?)");
    $insert_stmt->bind_param("sssss", $dep_id, $destination_id, $dateDep, $people, $trip_id);

   if (!$insert_stmt->execute()) {
        die('Error executing insert statement: ' . $insert_stmt->error);
    }


    $insert_stmt->close();

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hermes Flights</title>
  <link rel="stylesheet" href="CSS/styleflights.css">
<style>

  .box{
    flex-direction:column;
    
    display:flex;
    flex-wrap: wrap;
    
    background: rgba(172, 172, 172, 0.2);
    justify-content:center;
    align-items:center;
    
    margin-top: 50px;
    height: 49vh;
    
}
.h1 h1{
    
    text-align: center;
    font-size:40px;
    padding-top: 55px;
    padding-bottom: 2px;
    margin-top: 150px;
  
    color: #f5f5f5;
    
}

.form2{
    flex-direction: row;
    display:flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content:center;
    align-items:center;
  
    
}
.dep{
    
    width: 300px;
    height: 50px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    
}
.des{
    width: 300px;
    height: 50px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 5px;
    font-weight:bold;
    text-align: center;
    
}
.date{
    
    width: 300px;
    height: 50px;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.6);
    text-align: center;
    border-radius: 5px;
    border-color: #efefef;
}
.labeld{
    font-size: 20px;
    color: #010101;
    background: rgba(255, 255, 255, 0.3);
    font-weight:600;

}


.s1{
    height: 50px;
    width: 300px;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.6);
    text-align: center;
    border-radius: 5px;
    
    
}


.people{
    height: 50px;
    width: 300px;
    background: rgba(255, 255, 255, 0.6);
    font-weight: bold;
    text-align: center;
    border-color: rgb(204, 202, 202);
    border-radius: 5px;

   
}

 .bt3{
    background: rgba(255, 255, 255, 0.6);
    width: 250px;
    height:50px;
    border-radius: 5px;
    border-color: #efefef;
    cursor: pointer;
    border-style: outset;
    font-weight: bold;
    
    

}
@media (max-width: 768px) {
    
    .navbar{
      flex-direction: column;
      align-items: center;
      gap: 20px;
      margin-bottom: 250px;
    }
    .navbar .menu{
      flex-direction: column;
      gap: 15px;
      justify-content: center;
      align-items: center;
  
    }
    .navbar .search input{
      width: 75px;
    }
    .box{
      margin-top: 20px;
      height: auto;
      padding: 20px;
    }
    .form2{
      width: 100%;
      max-width: 400px;
      gap: 10px;
    }
    
    .footer{
        margin-top: 250px;
        height: auto;
      }
      
    }
    @media (max-width: 480px){
      body{
        display: flex;
        flex-direction: column;
        
        min-height: 100vh;

      }
     
      .navbar{
        flex-direction: column;
        align-items: center;
        gap: 5px;
        margin-bottom: 0px;
        
      }
      .navbar .menu ul{
        flex-direction: column;
        align-items: center;
        gap: 5px;
      } 
      .box{
        margin-top: 10px;
        padding: 10px;
      }
      .form2{
        width: 90%;
        max-width: 90%;
        padding: 10px;
      }
    

     
      .navbar .search input{
        width: 90%;
      }

      .h1 {
        font-size: 24px;
       
      }
    
     

      .dep,.des,.date,.s1,.people,.bt3{
        width: 90%;
      }

      .footer{
        flex-direction: column;
        
        text-align: center;
        margin-top: auto;
        padding: 15px;
        height: auto;
      }
      .footer h1{
        font-size: 25px;
      }
      .footer,.follow{
        font-size: 10px;
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
                             <li><a href="#" class="flights">FLIGHTS</a></li>
                             <li><a href="hotels.php">HOTELS</a></li>
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
                          <input class="sr" type="text" placeholder="Search" id="sInput"  required>
                          <button class="bt1" type="submit" id="sButton" onclick="searchButtonClicked()">Search</button>       
                        
                        </form>
                      
                      </div>
                   
                </div>
                <div class="h1">
                  <h1>Flights</h1>
                </div>
                
              <div class="box">
            
                    
                    <form id="f1" method="POST" class="form2">
                                    <select class="dep" size="1" id="dep" required name="departure">
                                      <option value="" disabled selected>Departure Airport</option>
                                      <?php
                                        foreach($airports as $airport){
                                        echo "<option value=\"$airport\">$airport</option>";
                                        }
                                      ?>
                                    </select>
                                    <select class="des" size="1" id="des" required name="destination">
                                      <option value="" disabled selected>Destination Airport</option>
                                      <?php
                                        foreach($airports as $airport){
                                        
                                        echo "<option value=\"$airport\">$airport</option>";
                                        }
                                      ?>                                
                                    </select>
                                    <input type="date" id="date" name="dateDep" class="date" >
                                    <select class="s1" id="roundtrip" required name="trip">
                                      <option value="" disabled selected>Trip</option>
                                      <?php
                                       foreach($tripType as $trip){
                                          echo "<option values=\$trip\">$trip</option>";
                                         }
                            
                                      ?>
                                    </select>
                                  <input type="number" min="1" placeholder="How many people?" class="people" id="people" required name="people"><br><br>
                                  <button class="bt3" id="sFlight" type="submit">Book Now</button>
                  </form>
                
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