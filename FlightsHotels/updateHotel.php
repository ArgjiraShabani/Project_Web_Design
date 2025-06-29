<?php
session_start();
    include "../connect.php";
    if (!isset($_SESSION['Email'])) {
        header('Location: ../Users/login.php');
        exit();
    }
$hotel="";
$hotelcountry="";
$hotelcity="";

if (isset($_GET['HotelID'])) {
    $hotelID = $_GET['HotelID'];
}
    $sql = "Select * FROM hotels WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $hotelID);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: airportshotels.php");
        exit;
    }

    $hotel = $row['HotelName'];
    $hotelcountry = $row['Country'];
    $hotelcity = $row['City'];



if(isset($_POST['submit'])){
    $hotel = $_POST['hotelname'];
    $hotelcity = $_POST['cityHotel'];
    $hotelcountry=$_POST['countryHotel'];

    $sql="Update hotels set HotelName=?, City=?,Country=? where ID=$hotelID ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $hotel,$hotelcity,$hotelcountry); 
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
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="button">
        <button type="button" ><a href="../Admin/admin.php">Dashboard</a></button>
        <button type="button"><a href="airportshotels.php">Airport/Hotel</a></button>
    </div>
    <div class="form">
    <form class="form2" method="POST">
        <br>
        <h1>Update Hotel</h1><br><br>
            <label for="hotel">Hotel Name:</label><br>
            <input type="text" name="hotelname" id="hotel" required value="<?php echo $hotel?>"><br><br>
            <label for="city">City:</label><br>
            <input type="text" name="cityHotel" id="city" required value="<?php echo $hotelcity?>"><br><br>
            <label for="country">Country:</label><br>
            <input type="text" name="countryHotel" required value="<?php echo $hotelcountry?>"><br><br>
            <button type="submit" class="submit" name="submit">Update</button>
            <br>
            <br>
            <br>
      </form>
    </div>
</body>
</html>

