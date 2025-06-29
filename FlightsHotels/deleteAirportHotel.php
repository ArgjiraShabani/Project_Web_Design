<?php

include "../connect.php";

if (isset($_GET['AirportID'])) {
    $airportID = $_GET['AirportID'];

    $sqlDelete = "DELETE FROM airports WHERE AirportID = ?";

    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $airportID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {

        header("Location: airportshotels.php");
        exit();
    } else {
        echo "Error: Unable to delete the airport.";
    }
    $stmt->close();
}


if (isset($_GET['HotelID'])) {
    $hotelID = $_GET['HotelID'];

    $sqlDelete = "DELETE FROM hotels WHERE ID = ?";

    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $hotelID);
    $stmt->execute();


    if ($stmt->affected_rows > 0) {

        header("Location: airportshotels.php");
        exit();
    } else {
        echo "Error: Unable to delete the hotel.";
    }
    $stmt->close();
}
?>
