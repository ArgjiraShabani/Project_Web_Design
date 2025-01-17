<?php
    include "connect.php";
    $errorMessage="";
    $successMessage="";

    if(isset($_GET['ID'])){
        $ID=$_GET['ID'];

        $sql="DELETE FROM users Where ID=?";
        $statement=$conn->prepare($sql);
        if(!$statement){
            die("SQL error: ".$conn->error);
        }
        $statement->bind_param("i",$ID);

        if($statement->execute()){
            header("Location: admin.php?message=User deleted successfully!");
            exit;
        }
        else{
            echo "User could not be deleted!";
        }
    }
    else{
        die("Invalid user ID.");
    }
?>