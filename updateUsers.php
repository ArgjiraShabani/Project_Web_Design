<?php
    include "connect.php";

   
    
    if(isset($_GET['ID'])){

    $ID=$_GET['ID'];

    $sql="SELECT * From users where ID=?";
    $statement=$conn->prepare($sql);
    $statement->bind_param("i",$ID);
    $statement->execute();
    $result=$statement->get_result();
    $user=$result->fetch_assoc();
    }

    if(!$user){
        header("Location: admin.php");
        exit;
   }
   $Name=$user['Name'];
   $Email=$user['Email'];
   $Password="";

   if($_SERVER['REQUEST_METHOD']=='POST'){
        $Name=$_POST['Name'];
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];

        if(empty($Name) || empty($Email) || empty($Password)){
            echo "Please fill all the fields!";
        }else{
            $hashedPassword=password_hash($Password,PASSWORD_BCRYPT);

            $sql="UPDATE users SET Name=?,Email=?,Password=?,Where ID=?";
            $statement=$conn->prepare($sql);
            $statement->bind_param("sssi",$Name,$Email,$hashedPassword,$ID);

            if($statement->execute()){
                header("Location: admin.php");
                exit;
            }
            else{
                echo "Gabim, perdoruesi nuk u perditesua!";
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