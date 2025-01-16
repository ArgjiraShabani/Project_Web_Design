
<?php
    include 'connect.php';


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddAirportsHotels</title>
    <link rel="stylesheet" href="addairportshotels.css">
</head>
<body>
    <div class="button">
       <button type="button" ><a href="admin.php">Dashboard</a></button>
    </div>
    <div class="airport">
        <h2>Available Airports</h2>
    </div>
    <div class="button">
        <button type="button"><a href="add.php">Add new Airport/Hotel</a></button>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr >
                    <th >ID</th>
                    <th >Airport</th>
                    <th >City</th>
                    <th >Country</th>
                    <th >Action</th>
               </tr>
            </thead>
               <tbody>
                <?php
                        
                       
    
                        
                $sql1='Select AirportID,AirportName,City,Country
                        from airports';
                        
                        
    
                $result =$conn->query($sql1);
                if(!$result){
                    die("Query invalid:".$conn->error);
                }
    
                while($row=$result->fetch_assoc()){
                    echo "
                            <tr>
                                
                            
                                <td >{$row['AirportID']}</td>
                                <td >{$row['AirportName']}</td>
                                <td >{$row['City']}</td>
                                <td >{$row['Country']}</td>
                                <td>
                                <a href='edit.php?ID={['ID']}'>Edit</a>
                                <a href='delete.php?ID={['ID']}'>Delete</a>
                                </td>
                            </tr>
    
                        
                        </tr>
    
                        
                        ";
                    }
                
            
                ?>
                            
                         </tbody>
            
                     </table>
        </div>
        
        <div class="heading2">
   <h2 >Available hotels</h2>

   </div>
    
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hotel</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Action</th>
                    
               </tr>
            </thead>
               <tbody>
                <?php
                        
                       
    
                        
                $sql1='select ID,HotelName,Country,City 
                        from hotels ';
                       
                        
    
                $result =$conn->query($sql1);
                if(!$result){
                    die("Query invalid:".$conn->error);
                }
    
                while($row=$result->fetch_assoc()){
                    echo "
                            <tr>
                                
                            
                                <td>{$row['ID']}</td>
                                <td>{$row['HotelName']}</td>
                                <td>{$row['Country']}</td>
                                <td>{$row['City']}</td>
                               <td>
                                <a href='edit.php?ID={['ID']}'>Edit</a>
                                <a href='delete.php?ID={['ID']}'>Delete</a>
                               </td>
                                 
    
                            
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