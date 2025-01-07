<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        
        <aside id="side-bar">
            <div class="side-bar">
            
                <h3>Menu</h3>
                <ul>
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#bookings">Bookings</a></li>
                    <li><a href="#destinations">Destinations</a></li>
                    <li><a href="#customers">Customers</a></li>
                    <li><a href="#reports">Reports</a></li>
                    <li><a href="#settings">Settings</a></li>
                </ul>
               
               
    
            </div>
        </aside>
       <div class="main_content">
             <header>
                  <h1>Welcome Admin!</h1>
                  <button><a href="logout.php">Logout</a></button>
                  <!--<button onclick="logout()" class="logout-btn">Logout</button>-->
            </header>
            <section id="dashboard" class="section">
                <div class="cards">
                    <h3>Total Bookings</h3>
                    <p id="total_bookings">Loading...</p>           

                </div>
                <div class="cards">
                    <h3>Total revenue</h3>
                    <p id="total_revenue">Loading...</p>           

                </div>
                <div class="cards">
                    <h3>Popular Destinations</h3>
                    <p id="popular_destinations">Loading...</p>           

                </div>
                <div class="charts">
               
            
            </section>
            <section id="bookings" class="section">
                <h2>Manage bookings</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Destinations</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="bookingTable">
                        <!--php-->
                    </tbody>
                </table>

            </section>
        </div>


    </div>
    <script src="login.js"></script>
    
</body>
</html>