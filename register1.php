<?php

include 'connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['name']) && $_POST['email'] && $_POST['password']){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    
   

    $checkEmail="SELECT * From users where Email=?";
    $stmt=$conn->prepare($checkEmail);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows>0){
        echo "Email adress already exists!";
    }
    else{
        $insertQuery="INSERT INTO users(Name,Email,Password)
                       VALUES (?,?,?)";
        $stmt=$conn->prepare($insertQuery);
        $stmt->bind_param("sss",$name,$email,$password);

        if($stmt->execute()){
            header("Location: Home.php");
            exit();
        }else{
            echo "Error: " .$conn->error;
        }

                      
    }


}
/*
if(isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
   

    $sql="SELECT * FROM users WHERE email=? ";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        if(password_verify($password,$row['password'])){
            session_start();
            $_SESSION['email']=$row['email'];
            header("Location: Home.php");
            exit();
        }else{
            echo "Incorrect password!";
        }
        
    }
    else{
        echo "No user found with this email.";
    }

}
}*/
else{
    echo "Invalid request method.";
}
}


?>
