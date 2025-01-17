
<?php
// Include the database connection
include "connect.php";
$airport="";
$city="";
$country="";
if (isset($_GET['AirportID'])) {
    $airportID = $_GET['AirportID'];
}
    $sql = "Select * FROM airports WHERE AirportID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $airportID);  // "i" denotes an integer
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: index.php");
        exit;
    }

    $airport = $row['AirportName'];
    $city = $row['City'];
    $country = $row['Country'];



if(isset($_POST['submit'])){
    $airport = $_POST['airportname'];
    $city = $_POST['city'];
    $country=$_POST['country'];

    $sql="Update airports set AirportName=?, City=?,Country=? where AirportID=$airportID ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $airport,$city,$country); 
    $stmt->execute();
    header("Location:airportshotels.php");
}
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
    </div>
    <div class="form">
      <form class="form1" method="POST">
        <br>
            <h1>Update Airport</h1><br><br>
            <label for="airport">Airport Name:</label><br>
            <input type="text" name="airportname" id="airport" required value="<?php echo $airport?>"><br><br>
            <label for="city">City:</label><br>
            <input type="text" name="city" id="city" required value="<?php echo $city?>"><br><br>
            <label for="country">Country:</label><br>
            <input type="text" name="country" required value="<?php echo $country?>"><br><br>
            <button type="submit" class="submit" name="submit">Add</button>
            <br>
            <br>
            <br>
      </form>
      <form class="form2" method="POST">
        <br>
        <h1>Update Hotel</h1><br><br>
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