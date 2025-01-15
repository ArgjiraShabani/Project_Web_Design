<?php
include "connect.php";
    $Name="";
    $Email="";
    $Password="";
    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $Name=$_POST['Name'];
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];
        if(empty($Name) || empty($Email) || empty($Password)){
            $errorMessage="Ju lutem plotesoni te gjitha fushat!";
        }else{
            $sql="INSERT INTO users(Name,Email,Password) VALUES('$Name','$Email','$Password')";
            $result=$connection->query($sql);

            if(!$result){
                $errorMessage="Gabim,perdoruesi nuk u shtua!";
            }else{
                $Name="";
                $Email="";
                $Password="";
                $successMessage="Perdoruesi u shtua me sukses!";
                header("Location: admin.php");
                exit; 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>