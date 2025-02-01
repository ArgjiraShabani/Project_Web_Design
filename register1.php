<?php
    session_start(); 
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
            $_SESSION['Email'] = $email; 
            $_SESSION['Name']=$name;
            setcookie('login', $email,time()+3600);
            header("Location: Home.php");
            exit();
        }else{
            echo "Error: " .$conn->error;
        }

                      
    }


}

else{
    echo "Invalid request method.";
}
}


?>
