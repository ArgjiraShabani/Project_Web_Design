<?php
    include 'connect.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="adminflightshotels.css" rel="stylesheet" >
</head>
<body>
    <div class="button">
       <button type="button" ><a href="admin.php">Dashboard</a></button>
    </div>
  <div class="heading">
  <h2>Flight Booking</h2>
  
  </div>


<div class="table">
    <table>
        <thead>
            <tr >
                <th >ID</th>
                <th >Departure</th>
                <th >Destionation</th>
                <th >DepartureDate</th>
                <th >Trip</th>
                <th>People</th>
           </tr>
        </thead>
           <tbody>
            <?php
                    
                   

                    
            $sql1='Select flight.FlightID,  flight.DepID,flight.ArrivalID,flight.Depature_date,(SELECT TripName FROM trip WHERE TripID = flight.TripID) as Trip,flight.People,(SELECT AirportName FROM airports WHERE AirportID = flight.DepID) as DepartureAirport,
                    (SELECT AirportName FROM airports WHERE AirportID = flight.ArrivalID) as ArrivalAirport
                    FROM flight';
                    

            $result =$conn->query($sql1);
            if(!$result){
                die("Query invalid:".$conn->error);
            }

            while($row=$result->fetch_assoc()){
                echo "
                        <tr>
                            
                        
                            <td >{$row['FlightID']}</td>
                            <td >{$row['DepartureAirport']}</td>
                            <td >{$row['ArrivalAirport']}</td>
                            <td >{$row['Depature_date']}</td>
                            <td >{$row['Trip']}</td>
                            <td>{$row['People']}</td>
                             

                        
                        </tr>

                    
                    </tr>

                    
                    ";
                }
            
        
            ?>
                        
                     </tbody>
        
                 </table>
    </div>

   <div class="heading2">
   <h2 >Hotel Reservations</h2>

   </div>
    
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hotel</th>
                    <th>CheckIn</th>
                    <th>CheckOut</th>
                    <th>Rooms</th>
                    <th>Guests</th>
               </tr>
            </thead>
               <tbody>
                <?php
                        
                       
    
                        
                $sql1='Select hotelbook.ID,(Select HotelName from hotels where ID=hotelbook.HotelID) as Hotel,  hotelbook.CheckIn,hotelbook.CheckOut,hotelbook.Rooms,hotelbook.Guests
                       from hotelbook';
                       
                        
    
                $result =$conn->query($sql1);
                if(!$result){
                    die("Query invalid:".$conn->error);
                }
    
                while($row=$result->fetch_assoc()){
                    echo "
                            <tr>
                                
                            
                                <td>{$row['ID']}</td>
                                <td>{$row['Hotel']}</td>
                                <td>{$row['CheckIn']}</td>
                                <td>{$row['CheckOut']}</td>
                                <td>{$row['Rooms']}</td>
                                <td>{$row['Guests']}</td>
                                 
    
                            
                            </tr>
                        </tr>
    
                        ";
                    }
            
                ?>
                            
                         </tbody>
            
                     </table>
        </div>

</body>
</html>