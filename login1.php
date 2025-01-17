<?php
    include "connect.php";
    $errorMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['Email']) && isset( $_POST['Password'])){
            
                $email=$_POST['Email'];
                $password=$_POST['Password'];

                $sql="SELECT * From users Where Email=?";
                $statement=$conn->prepare($sql);
                $statement->bind_param("s",$email);
                $statement->execute();
                $result=$statement->get_result();

                if($result->num_rows>0){
                    $row=$result->fetch_assoc();

                    if(password_verify($password,$row['Password'])){
                        session_start();
                        $_SESSION['Email']=$row['Email'];
                        header("Location: Home.php");
                        exit();
                    }
                    else{
                        $errorMessage="Incorrect password!";
                    }
                }else{
                    $errorMessage="No user found with this email!";

                }
                
            
        }else{
            $errorMessage="Please fill in all the fields!";
        }
    }
?>