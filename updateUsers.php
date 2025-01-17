<?php
    include "connect.php";
    $errorMessage="";
    $successMessage="";

   
    
    if(isset($_GET['ID'])){

        $ID=$_GET['ID'];

        $sql="SELECT * From users where ID=?";
        $statement=$conn->prepare($sql);
        $statement->bind_param("i",$ID);
        $statement->execute();
        $result=$statement->get_result();
        if($result && $result->num_rows>0){
            $user=$result->fetch_assoc();

         }else{
             header("Location: admin.php");
            exit;
         }
    }else{
        header("Location: admin.php");
    }
    
    

    
   $Name=$user['Name'];
   $Email=$user['Email'];
   $Password="";

   if($_SERVER['REQUEST_METHOD']=='POST'){
        $Name=$_POST['Name'];
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];

        if(empty($Name) || empty($Email) || empty($Password)){
            $errorMessage= "Please fill all the fields!";
        }else{
            $hashedPassword=password_hash($Password,PASSWORD_BCRYPT);

            $sql="UPDATE users SET Name=?,Email=?,Password=? Where ID=?";
            $statement=$conn->prepare($sql);
            $statement->bind_param("sssi",$Name,$Email,$hashedPassword,$ID);

            if($statement->execute()){
                $successMessage="User updated successfully";
                header("Location: admin.php");
                exit;
            }
            else{
                $errorMessage="User could not be updated";
            }
        }

   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user</title>
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
form{
position: relative;
    max-width: 550px;
    flex: 1;
    flex-direction: column;
    flex-wrap: wrap; 
    padding: 20px ;
    border-radius: 12px;     
    gap: 5px;
    
    background-color: #002349; 
    display: flex;
    justify-content: space-between;  
   
   margin: 90px 550px;
   /* margin-left: 50px;
    margin-bottom: 10px;*/
}
form label{
    color: #fff;
    font-size: 20px;
}
form input{
    padding: 10px;
    height: 100%;
    width: 100%;
    max-width: 500px;
    margin: 10px;
    border: none;
    border-bottom: 1.5px solid#000080;
    font-size: 20px;

}
h2{
    text-align: center;
    margin-top: 50px;
}
button{
    width: 100%;
    background-color:  rgb(253, 251, 240);
    color: #002349;
    padding: 15px;
    font-size: 20px;
}
a{
    color: rgb(253, 251, 240);
    text-decoration: none;
}

    </style>
</head>
<body>
    <h2>Update user</h2>
    <?php
        if(!empty($errorMessage)){
            echo "<strong>$errorMessage</strong>";
        }else{
            echo "<strong>$successMessage</strong>";

        }

       
    ?>
    <form action="" method="POST">
    <label for="Name">Name:</label>
    <input type="text" name="Name" value="<?php echo $Name?>">
    <br><br>
    <label for="Email">Email:</label>
    <input type="email" name="Email" value="<?php echo $Email?>">
      <br><br>
      <label for="Password">Password:</label>
    <input type="password" name="Password" value="<?php echo $Password?>">
    <br><br>
    <button type="submit">Submit</button>
        <a href="admin.php" role="button">Cancel</a>
    </form>
    
</body>
</html>