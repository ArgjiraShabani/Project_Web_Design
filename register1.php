/*?php

include 'connect.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
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
                        header("Location: home.php");
                        exit();

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
        header("Location: home.php");
        exit();
    }
    else{
        echo "Not Found, incorrect email or password";
    }

}
}
else{
    echo "Incorrect email or password";
}


?>
*/

<?php
include 'connect.php';
$message="";
$toastClass="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name= $_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $checkEmailStmt->bind_param("s",$email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if($checkEmailStmt->num_rows>0){
        $message="Email already exists";
        $toastClass="#007bff";
    }else{
        $stmt=$conn->prepare("INSERT INTO users($name,$email,$password) VALUES(?,?,?)");
        $stmt->bind_param("sss",$name,$email,$password);

        if($smt->execute()){
            $message="Account created successfully";
            $toastClass="#28a745";
        }
        else{
            $message="Error: ".$stmt->error;
            $toastClass="#dc3545";
        }
        $stmt->close();

        
    }
    $checkEmailStmt->close();
    $conn->close();

}
?>