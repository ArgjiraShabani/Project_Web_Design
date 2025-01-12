<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Register</title>
    <link rel="stylesheet" href="stylelogin.css">
  
    
    
</head>   
<body>
    <div class="navbar">
        <div class="icon">
            <a href="Home.html"><h2 class="logo">HERMES</h2></a>
            <h5 class="l1">TRAVEL</h5>
        </div>
        <div class="menu">
          <ul>
               <li><a href="Home.html">HOME</a></li>
               <li><a href="flights.html" class="flights">FLIGHTS</a></li>
               <li><a href="hotels.html">HOTELS</a></li>
               <li><a href="contact.php">CONTACT US</a></li>
          </ul>
          
        </div>
        <div class="search">
            <input class="sr" type="text" placeholder="Search">
            <button class="bt1">Search</button>       
      
      
          

        </div>
  </div>

    <div class="container">
        <div class="form_container-register" >
            <form action="register1.php" method="POST" id="form" onsubmit="return getRegisterFormErrors(event)"  >
                <h1 style="font-weight: bold;">Register</h1>
                <p id="error-message"></p>
                
                <div class="input-box" >                   
                
                    <input type="text" id="name"  class="name-register" placeholder="Enter your name" name="name" >
                    <i class="fa-solid fa-user"></i>
                    
                </div>
                
                <div class="input-box" >                   
                
                    <input type="email" id="email" class="email-login" placeholder="Enter your email"  name="email">
                    <i class="fa-regular fa-envelope"></i>
                    
                </div>
                
                <div class="input-box">                   
                
                    <input id="password" class="password-login" type="password" placeholder="Enter your password" name="password">
                    <i class="fa-solid fa-lock" ></i>
                    <!--<i class="fa-solid fa-eye-slash" id="hide-pw"></i>-->
                  
                </div>
                
                <div class="input-box">                   
                
                    <input id="password2" class="password-login" type="password" placeholder="Confirm your password" name="password-confirm">
                    <i class="fa-solid fa-lock" ></i>
                <!--<i class="fa-solid fa-eye-slash" id="hide-pw"></i>-->
                    
                    
                </div>
                <div class="button">
                    
                    <button  type="submit" name="register">Register</button>
                </div>
            </form>
           
            <p>Already have an account?<a href="login.html"> Login</a></p>
            

        </div>
    </div>
    
   
    <script type="text/javascript" src="login.js" defer></script>
   
</body>
</html>