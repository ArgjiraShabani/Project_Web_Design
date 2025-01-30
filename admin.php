<?php
    session_start();
    include "connect.php";
   if(isset($_SESSION['Email'])){

    $sql="SELECT ID,Name,Email,Password,registration_date FROM users";
    $result=$conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">

    <style>
        button {
        background-color: #002349;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    .side-bar li:hover {
            background-color:rgb(5, 53, 103);
        }

    

    a {
        text-decoration: none;
    }
    .logout_btn{
        text-decoration: none;
        color: #ffff;
        font: size 16px;
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
                    <li style="background-color: rgb(253, 251, 240);"><a href="#dashboard" style="color: #002349;">Dashboard</a></li>
                    
                    <li><a href="contactadmin.php">User Contact</a></li>
                    
                    <li><a href="airportshotels.php">Airport/Hotel</a></li>
                    <li><a href="adminflightshotels.php">Flight Booking/Hotel Reservations</a></li>
                    
                    
                </ul>
               
               
    
            </div>
        </aside>
       <div class="main_content">
             <header>
                  <h1>Welcome Admin!</h1>
                  <?php
                     echo "<button class='logout_btn'><a href='logout.php' style='color:white;'>Logout</a></button>";
                  ?>
            </header>
           
            <section id="bookings" class="section">
                <h2 style="display: flex;
                 justify-content: space-between;
                 align-items: center;
                margin-bottom: 20px;" >Manage users</h2>
                <button style="border: none;
                        padding: 10px 20px;
                        cursor: pointer;
                        background-color:  #002349;margin-bottom: 40px;
                        "><a style="text-decoration: none;font: size 16px;color: #fff;" href="create.php">Add a user</a></button>
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Registration date</th>
                            
                        </tr>
                    </thead>
                    <tbody id="bookingTable">
                        <?php
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                echo "<tr>
                                        <td>{$row['ID']}</td>
                                        <td>{$row['Name']}</td>
                                        <td>{$row['Email']}</td>
                                        <td>{$row['Password']}</td>
                                        <td>{$row['registration_date']}</td>
                                        <td><a href='updateUsers.php?ID=" . $row['ID'] . "'>
                                     <button>Update</button>
                                    </a> </td>
                                        <td><a href='deleteUsers.php?ID=" . $row['ID'] . "'>
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

            </section>
        </div>


    </div>
    <script src="login.js"> </script>
    
</body>
</html>
<?php
$conn->close();
                    }
?>