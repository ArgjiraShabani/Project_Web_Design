<?php
session_start(); 
include '../connect.php';


$email = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Email']) && isset($_POST['Password'])) {
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        
        $query = 'SELECT * FROM users WHERE Email = ?';

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('s', $email);
            
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();

                    if (password_verify($password, $user['Password'])) {
                        
                        $_SESSION['Email'] = $email;
                        $_SESSION['role'] = $user['role'];
                         
                        setcookie('login', $email,time()+3600);
                       
                        if ($_SESSION['role'] == 'user') {
                            header('Location: ../HomePage/home.php');  
                        } else {
                            header('Location: ../Admin/admin.php');   
                        }
                        exit();  
                    } else {
                      
                        echo "<script>alert('Invalid email or password.');</script>";
                    }
                } else {
                   
                    echo "<script>alert('Invalid email or password.');</script>";
                }
            } else {
                echo "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    } else {
        echo "<script>alert('Please provide both email and password.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <title>LogIn</title>
    <link rel="stylesheet" href="CSS/stylelogin.css">
    
</head>
    
<body>
    <div class="navbar">
        
      <div class="icon">
            <a href="../HomePage/Home.php"><h2 class="logo">HERMES</h2></a>
            <h5 class="l1">TRAVEL</h5>
        </div>
        <div class="menu">
          <ul>
                <li><a href="../HomePage/Home.php">HOME</a></li>
                <li><a href="../FlightsHotels/flights.php" class="flights">FLIGHTS</a></li>
                <li><a href="../FlightsHotels/hotels.php">HOTELS</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
              
          
        </div>
        <div class="search">
            <form>
            <input class="sr" id="sr" type="text" placeholder="Search" required>
            <button class="bt1" onclick="searchButtonClicked()">Search</button>       
            </form>
        </div>
  </div>
    
    <div class="container" id="container">
       
        <div class="form_container-login">
           
            <form id="form" onsubmit="return getLogInFormErrors(event)" method="POST" action="login.php" >
                <h1 style="font-weight: bold;">Login</h1>
                <p id="error-message"></p>
                <div class="input-box">                   
                
                    <input type="email" id="email" class="email-login" placeholder="Enter your email" name="Email">
                    <i class="fa-regular fa-envelope"></i>
                    <div class="error"></div>
                </div>
                <div class="input-box">                   
                
                    <input id="password" class="password-login" type="password" placeholder="Enter your password" name="Password">
                   
                    <i class="fa-solid fa-lock"></i>
                    <div class="error"></div>
                </div>
                <div class="input-box">                   
                
                    <button type="submit" name="login">Login</button>
                    
                </div>
                
            
            
    
            </form>
            <?php
                if(!empty($errorMessage)){
                    echo "<strong>$errorMessage</strong>";
                }
            ?>
            <p>New here?<a href="register.php"> Create a new account</a></p>
            
        </div>
    </div>
  
     
    <script type="text/javascript" src="login.js" defer>
    
        document.querySelector("form").addEventListener("submit", function(event) {
            console.log("Form submitted");
        });
</script>
    
</body>
</html>