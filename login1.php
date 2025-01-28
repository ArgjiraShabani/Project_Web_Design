<?php
    include "connect.php";
    session_start();
    $errorMessage="";
    

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['Email']) && isset( $_POST['Password'])){
            
                $email=$_POST['Email'];
                $password=$_POST['Password'];

                $sql="SELECT * From users Where Email=? ";
                $statement=$conn->prepare($sql);
                $statement->bind_param("s",$email);
                $statement->execute();
                $result=$statement->get_result();

                if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                    

                    if(password_verify($password,$row['Password'])){

                        $_SESSION['user_id']=$row['id'];
                        $_SESSION['Email']=$row['Email'];
                        $_SESSION['Role']=$row['Role'];

                        if($row['Role']==='admin'){
                            header("Location: admin.php");
                        }else{
                            header("Location:Home.php");

                        }

                        
                        
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
        $statement->close();
    }
    $conn->close();
?>