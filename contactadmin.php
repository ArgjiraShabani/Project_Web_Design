<?php
    include "connect.php";
    $sql="SELECT ID,first_name,last_name,email,phone,message,date FROM contact_us";
    $result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Forum&family=Italiana&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Forum", sans-serif;
            font-weight: 100;
            font-style: normal;
            
        
        }
        body{
            background-color: rgb(253, 251, 240);
            margin: 0;
        }
        
        .container{
            display: flex;
            flex-wrap: nowrap;
            margin-left: 220px;
            padding-top: 30px;
        }
            .side-bar{
               /* margin: 16px;
                padding: 0;
                width: 200px;
                background: #002349;
                position: fixed;
                height: 100%;
                color: white;
                display: flex;
                flex-direction: column;*/
                position: fixed;
                top: 0;
                left: 0;
                width: 200px;
                height: 100%;
                color: white;
                display: flex;
                flex-direction: column;
                padding: 20px 0;






                

                
            }
            .side-bar h3{
                padding: 20px;

            }
            .side-bar li {
                display: block;
                color: white;
                padding: 16px;
                text-decoration: none;
                background-color: #002349;
                width: 100%;
            
            }

            .side-bar a{
                text-decoration: none;
                color: white;
                font-size: 16px;
                width: 100%;
            }
            .side-bar li:hover {
                background-color: #005f7f;
}

        h1{
            font-size: 22px;
            
           
        }
        button {
            background-color: #002349;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 30px;
        }
        button a{
            text-decoration: none;
            color: white;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 150px;

        }
        table th,table td{
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th{
            background-color: #002349;
            color: #fff;
            font-weight: bold;
        }

    </style>
</head>
<body>
<h1>User Contact</h1>

<div class="container">
   
    <aside id="side-bar">
                <div class="side-bar">
                
                
                    <h3>Menu</h3>
                    <ul>
                        <li ><a href="admin.php" style="color: #fff">Dashboard</a></li>
                        
                        <li style="background-color: rgb(253, 251, 240);" ><a href="contactadmin.php" style="color: #002349;">User Contact</a></li>
                        
                        
                        <li><a href="airportshotels.php">Airport/Hotel</a></li>
                        <li><a href="adminflightshotels.php">Flight Booking/Hotel Reservations</a></li>
                        
                        
                    </ul>
                
                
        
                </div>
            </aside>
   

    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    echo "<tr>
                                            <td>{$row['ID']}</td>
                                            <td>{$row['first_name']}</td>
                                            <td>{$row['last_name']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['phone']}</td>
                                            <td>{$row['message']}</td>
                                            <td>{$row['date']}</td>
                                            
                                            
                                        </tr>";
                                }
                            }else{
                                echo "<tr>
                                        <td colspan='4' >No users found</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
</div>
    
</body>
</html>