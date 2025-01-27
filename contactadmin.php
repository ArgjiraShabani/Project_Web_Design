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
        .main{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1{
            font-size: 22px;
            margin-bottom: 30px;
            margin: 30px;
           
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
            width: 90%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 30px;

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
    <div class="main">
        <h1>User Contact</h1>
        <button><a href="admin.php">Dashboard</a></button>
    </div>
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
    
</body>
</html>