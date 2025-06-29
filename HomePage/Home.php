<?php
   session_start();

    include "../connect.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hermes Travel</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
</head>
<body>

  
      <div class="main">
                      <div class="navbar">
                          <div class="icon">
                              <a href="Home.php"><h2 class="logo">HERMES</h2></a>
                              <h5 class="l1">TRAVEL</h5>
                          </div>
                          <div class="menu"> 
                            <ul>
                                  <li><a href="#" class="home">HOME</a></li>
                                  <li><a href="../FlightsHotels/flights.php">FLIGHTS</a></li>
                                  <li><a href="../FlightsHotels/hotels.php">HOTELS</a></li>
                                  <li><a href="../Users/contact.php">CONTACT US</a></li>
                            </ul>
                            
                          </div>
                          <div class="button2">
                            
                             
                             <?php
                              if(isset($_SESSION['Email'])){
                                echo '<a href="../Users/logout.php" id="loginLink"><button class="bt2" id="lButton" type="submit" >Logout</button></a>';
                              }else{
                                echo '<a href="../Users/login.php" id="loginLink"><button class="bt2" id="lButton" type="submit" onclick="loginButtonClicked()">Login</button></a>';
                              }
                             ?>
                            
                            </div>
                           <div class="search">
                            <form>
                              <input class="sr" type="text" placeholder="Search" id="sInput" required>
                              <button class="bt1" id="sButton" type="submit" onclick="searchButtonClicked()">Search</button>     
                            </form>
                          </div>
                      </div>
                      
                    
                   <div class="home-page">
                     <img src="https://assets.vogue.com/photos/5d2f42b7f1478f0008831821/master/w_2560%2Cc_limit/00-story-image-amalfi-coast-italy-travel-guide.jpg" alt="">
                      
                      <h2>Unforgettable moments, with HERMES</h2>
                      

                    </div>
                  
                    
                   <div class="container">     
                      <div class="content">
                          
                            
                            <h2><i>Escape the ordinary</i></h2>
                            <p><i>
                            Dive into the miracles of the world with HERMES travel.
                            Explore the beautiful cities, the enchanting nature and mystical wonders all over the world,
                            accompanied by luxurious and comfortable travel experiences.</i>
                            </p>            

                       </div>
                      <div class="gallery-section">
                          <div class="galleryh2">
                          <h2>The start of a new adventure</h2>
                          <p>At HERMES Travel, we believe that every journey should be as seamless and memorable as the destination itself. Specializing in curated luxury tours and customized travel packages, we take pride in creating unforgettable travel experiences tailored to your desires.</p>
                          <p>From booking international flights and exclusive accommodations to organizing tailored sightseeing tours, our full-service travel agency takes care of every detail, allowing you to relax and enjoy your trip. With our extensive network of global partners and expert knowledge, you'll enjoy the best deals and insider tips, ensuring that your journey is affordable, hassle-free, and memorable. Let us craft the perfect travel itinerary for your next adventure. Contact us today to start planning! </p>
                          </div>
                          
                      
                            <div class="gallery">
                                  <img src="https://i.pinimg.com/736x/70/b9/ba/70b9bad4d771d69f160004b317ca5770.jpg" alt="img2">
                            </div>
                                
            

                       </div>
                   </div>
                  
              
                   
                      <div class="slider">
                        <div class="img-box">
                          <img src="../Images/gettyimages-1089728672-scaled.jpg" class="slider-img">
                        </div>

                        <button class="btn1" onclick="prev()">&#10094</button>
                        <button class="btn2" onclick="next()">&#10095</button>
                      </div>
                    
                                    
      
    
                   

          
      
      <div class="title">
        <p>Our favourite destinations</p>
        
      </div>
      <div class="container-destinations">
        
       <img src="https://eia476h758b.exactdn.com/wp-content/uploads/2023/08/Ksamil-beaches.-Four-islands-scaled.jpeg?strip=all&lossy=1&ssl=1" alt="">
        <img src="https://64.media.tumblr.com/ee869b778a7831a2a9f1fb78dd92b432/tumblr_ndakjyFYRf1t0egxho1_1280.jpg" alt="">
        <img src="https://www.traveloffpath.com/wp-content/uploads/2022/07/Vienna-Aerial-View.jpg" alt="">
        <img src="https://images.movehub.com/wp-content/uploads/2022/01/Singapore-supertrees-1.jpeg" alt="">
        <img src="https://www.exploreworldwide.com/medialibraries/explore/explore-media/destinations/middle%20east/egypt/egypt-header.jpg?ext=.jpg&width=1920&format=webp&quality=80&v=201704211554%201920w" alt="">
        <img src="https://i.natgeofe.com/k/654b8740-8a21-4832-9c3a-d3e4a591ccbf/ireland-cliffs-of-moher_4x3.jpg" alt="">
        
      </div>
    </div>
      <hr class="horizontal-line">
    
      <div class="footer">
        <h1>Hermes</h1>
        
                <div class="follow">
                  <h3>Follow us</h3><br>
                  <p><a href="#">Instagram</a></p>
                  <br>
                  <p><a href="#">Facebook</a></p>
                  <br>
                  <p><a href="#">WhatsApp</a></p>
                  <br>
                  <br>
                </div>
                <div class="services">
                  <h3>Our Services</h3><br>
                  <p><a href="#">> Security</a></p><br>
                  <p><a href="#">>Before Travel</a></p><br>
                  <p><a href="#">>Hand Laggage</a></p><br>
                  <p><a href="#">>Cars</a></p>
                </div>
              
      </div>
      
      </div>
      <script src="home.js"></script>
</body>
</html>
            