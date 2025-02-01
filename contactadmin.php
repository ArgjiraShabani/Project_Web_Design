<?php
    
    session_start();
    include "connect.php";
    if (!isset($_SESSION['Email'])) {
        header('Location: login.php');
        exit();
    }
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
            
            height: 100vh;
        }
        .side-bar{
           
            width: 200px;
            background: #002349;
            position: fixed;
            height: 100%;
            color: white;
            display: flex;
            flex-direction: column;
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
            background-color:rgb(5, 53, 103);
        }
        .main-content{
            margin-left: 220px;
            width: calc(100%-200px);
            padding: 20px;
        }

        h1{
            font-size: 22px;
            
            padding: 20px;
            color: #002349;
            
           
        }
        button {
            background-color: #002349;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 30px 0;
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
            margin: 30px auto;

        }
        table th,table td{
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th{
            background-color: #002349;
            color: #fff;
            font-weight: bold;
        }
        table button{
            
        background-color: #002349;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
         }
        
        @media(max-width: 768px){
            .container{
                flex-direction: column;
            }
            .side-bar{
                width: 100%;
                position: relative;
                display: flex;
                flex-direction: row;
                overflow-x: auto;
                white-space: nowrap;
            }
            .side-bar ul{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                width: 100%;
            }
            .side-bar li{
                display: inline-block;
                padding: 10px;
            }
            .main-content{
                margin-left: 0;
                width: 100%;
                padding: 15px;
            }
        }
        @media(max-width: 480px){
            .side-bar{
                flex-direction: column;
                align-items: center;
            }
            .side-bar li{
                text-align: center;
                width: 100%;
            }
        }

    </style>
</head>
<body>


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
        <div class="main-content">

            <h1>User Contact</h1>

        <div style="overflow-x:auto;">
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
                                            <td><a href='deleteUserContact.php?ID=" . $row['ID'] . "'>
                                            <button>Delete</button>
                                            </a> </td>
                                            
                                            
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
        </div>
</div>
    
</body>
</html>