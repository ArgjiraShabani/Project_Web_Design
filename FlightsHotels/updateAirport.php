
<?php

session_start();
    include "../connect.php";
    if (!isset($_SESSION['Email'])) {
        header('Location: ../Users/login.php');
        exit();
    }
$airport="";
$city="";
$country="";
if (isset($_GET['AirportID'])) {
    $airportID = $_GET['AirportID'];
}
    $sql = "Select * FROM airports WHERE AirportID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $airportID); 
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: airportshotels.php");
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
    exit;
}

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/add.css">
</head>
<body>
    <div class="button">
        <button type="button" ><a href="../Admin/admin.php">Dashboard</a></button>
        <button type="button"><a href="airportshotels.php">Airport/Hotel</a></button>
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
            <button type="submit" class="submit" name="submit">Update</button>
            <br>
            <br>
            <br>
      </form>
    
    </div>
</body>
</html>