<?php
    include 'connect.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  
  <h2>Flights</h2>


<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Departure</th>
                <th>Destionation</th>
                <th>Departure Date</th>
                <th>Trip</th>
                <th>People</th>
           </tr>
        </thead>
           <tbody>
                <?php
                    
                   

                    $sql='Select * From flight';
                    
                    $result =$conn->query($sql);
                    if(!$result){
                        die("Query invalid:".$conn->error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo "
                        <tr>
                            
                        
                            <td>{$row['FlightID']}</td>
                            <td>{$row['DepID']}</td>
                            <td>{$row['ArrivalID']}</td>
                            <td>{$row['Depature_date']}</td>
                             <td>{$row['People']}</td>
                             <td>{$row['TripID']}</td> 
                             

                        
                        </tr>

                    
                        ";
                    }
                
            
                ?>
          </tbody>
        
    </table>
                </div>
</body>
</html>