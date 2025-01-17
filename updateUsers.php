<?php
    include "connect.php";

    if(!isset($_GET['ID'])){
        header("Location: admin.php");
        exit;
    }

    $ID=$_GET['ID'];

    $sql="SELECT * From users where ID=?";
    $statement=$conn->prepare($sql);
    $statement->bind_param("i",$ID);
    $statement->execute();
    $result=$statement->get_result();
    $user=$result->fetch_assoc();

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

            $sql="UPDATE users SET Name=?,Email=?,Password=?,Where id=?";
            $statement=$conn->prepare($sql);
            $statement->bind_param("sssi",$Name,$Email,$hashedPassword,$id);

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