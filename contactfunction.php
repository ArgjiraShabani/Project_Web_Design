<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['message'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $message=$_POST['message'];

        $insertQuery="INSERT INTO contact_us(first_name,last_name,email,phone,message)
                       VALUES (?,?,?,?,?)";
        $stmt=$conn->prepare($insertQuery);
        $stmt->bind_param("sssss",$firstname,$lastname,$email,$number,$message);

        if($stmt->execute()){
            header("Location: contact.php");
            echo "The form has been successfully submited!";
            exit();
        }else{
            echo "Error: " .$conn->error;
        }


}
}



?>