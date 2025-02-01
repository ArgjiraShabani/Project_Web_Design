<?php  
  include 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['airportname']) && $_POST['city'] && $_POST['country']){
  $airport = $_POST['airportname'];
  $city = $_POST['city'];
  $country=$_POST['country'];
 
  
  $sql1='insert into airports(AirportName,City,Country)values(?,?,?)';
  if ($stmt = $conn->prepare($sql1)) {
  
    $stmt->bind_param("sss", $airport, $city, $country);

    if ($stmt->execute()) {
      
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing query: " . $conn->error;
}
}}
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['hotelname']) && $_POST['cityHotel'] && $_POST['countryHotel']){
  $hotel = $_POST['hotelname'];
  $cityHotel = $_POST['cityHotel'];
  $countryHotel=$_POST['countryHotel'];
 
  
  $sql='insert into hotels(HotelName,City,Country)values(?,?,?)';
  if ($stmt = $conn->prepare($sql)) {

    $stmt->bind_param("sss", $hotel, $cityHotel, $countryHotel);
    
    if ($stmt->execute()) {
      
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing query: " . $conn->error;
}
}}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="button">
        <button type="button" ><a href="admin.php">Dashboard</a></button>
        <button type="button"><a href="airportshotels.php">Airport/Hotel</a></button>
    </div>
    
    <div class="form">
      <form class="form1" method="POST">
        <br>
            <h1>Add Airport</h1><br><br>
            <label for="airport">Airport Name:</label><br>
            <input type="text" name="airportname" id="airport" required><br><br>
            <label for="city">City:</label><br>
            <input type="text" name="city" id="city" required><br><br>
            <label for="country">Country:</label><br>
            <input type="text" name="country" required><br><br>
            <button type="submit" class="submit">Add</button>
            <br>
            <br>
            <br>
      </form>
      <form class="form2" method="POST">
        <br>
        <h1>Add Hotels</h1><br><br>
            <label for="hotel">Hotel Name:</label><br>
            <input type="text" name="hotelname" id="hotel" required><br><br>
            <label for="city">City:</label><br>
            <input type="text" name="cityHotel" id="city" required><br><br>
            <label for="country">Country:</label><br>
            <input type="text" name="countryHotel" required><br><br>
            <button type="submit" class="submit">Add</button>
            <br>
            <br>
            <br>
      </form>
    </div>
</body>
</html>