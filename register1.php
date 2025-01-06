<?php

include 'connect.php';

if(isset($_POST['register'])){
    $name=$_POST['name'];
    $emai=$_POST['email'];
    $password=$_POST['password'];
    $password= md5($password);

    $checkEmail="SELECT * From users where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email adress already exists!";
    }
    else{
        $insertQuery="INSERT INTO users(name,email,password)
                       VALUES ('$name','$email','$password')";

                       if($conn->query($insertQuery)==TRUE){
                        header("location: register.php");

                       }
                       else{
                        echo "Error:".$conn->error;
                       }
    }


}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location : home.php");
        exit();
    }
    else{
        echo "Not Found, incorrect email or password";
    }

}

?>