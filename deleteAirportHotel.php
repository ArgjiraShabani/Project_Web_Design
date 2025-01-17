<?php
// Include the database connection
include "connect.php";

// Check if AirportID is provided in the URL
if (isset($_GET['AirportID'])) {
    $airportID = $_GET['AirportID'];

    // Delete query using MySQLi OOP
    $sqlDelete = "DELETE FROM airports WHERE AirportID = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $airportID);  // "i" denotes an integer
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        // Redirect to the airports list page
        header("Location: airportshotels.php");
        exit();  // Always call exit after a header redirect
    } else {
        echo "Error: Unable to delete the airport.";
    }

    // Close the statement
    $stmt->close();
}



// Check if AirportID is provided in the URL
if (isset($_GET['HotelID'])) {
    $hotelID = $_GET['HotelID'];

    // Delete query using MySQLi OOP
    $sqlDelete = "DELETE FROM hotels WHERE ID = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $hotelID);  // "i" denotes an integer
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        // Redirect to the airports list page
        header("Location: airportshotels.php");
        exit();  // Always call exit after a header redirect
    } else {
        echo "Error: Unable to delete the hotel.";
    }

    // Close the statement
    $stmt->close();
}
?>
