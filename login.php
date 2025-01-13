<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <title>LogIn</title>
    <link rel="stylesheet" href="stylelogin.css">
    
</head>
    
<body>
    <div class="navbar">
        
        <div class="icon">
            <a href="Home.php"><h2 class="logo">HERMES</h2></a>
            <h5 class="l1">TRAVEL</h5>
        </div>
        <div class="menu">
          <ul>
                <li><a href="Home.php">HOME</a></li>
                <li><a href="flights.php" class="flights">FLIGHTS</a></li>
                <li><a href="hotels.html">HOTELS</a></li>
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
            <form id="form" onsubmit="return getLogInFormErrors(event)" method="post" action="register1.php">
                <h1 style="font-weight: bold;">Login</h1>
                <p id="error-message"></p>
                <div class="input-box">                   
                
                    <input type="email" id="email" class="email-login" placeholder="Enter your email" name="email">
                    <i class="fa-regular fa-envelope"></i>
                    <div class="error"></div>
                </div>
                <div class="input-box">                   
                
                    <input id="password" class="password-login" type="password" placeholder="Enter your password" name="password">
                   
                    <i class="fa-solid fa-lock"></i>
                    <div class="error"></div>
                </div>
                <div class="input-box">                   
                
                    <button type="submit" name="login">Login</button>
                    
                </div>
                
            
            
    
            </form>
            <p>New here?<a href="register.php"> Create Account</a></p>
            
        </div>
    </div>
  
     
    <script type="text/javascript" src="login.js" defer></script>
    
</body>
</html>