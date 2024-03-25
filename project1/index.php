<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!--custom css part-->
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <!--header section start-->

    <header>
    <?php
        session_start(); 

        // Eğer kullanıcı giriş yaptıysa, login-btn ikonunu gizle
        $loginButtonStyle = isset($_SESSION['user']) ? 'style="display: none;"' : '';
    ?>


    <?php
        session_start(); 

        // Eğer kullanıcı giriş yaptıysa, kullanıcı adını ve çıkış butonunu göster
        if(isset($_SESSION['user'])) {
            echo "<div class='logo'>";
            echo "<span>welcome, " . $_SESSION['user']['username'] . "</span>"; // Kullanıcı adını yazdır
            echo "<form action='login-page/logout.php' method='post' class='logout-form'>";
            echo "<button type='submit' name='logout' class='btn'>Quit</button>";
            echo "</form>";
            echo "</div>";
        }
    ?>


        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="index.php" class="logo"><span>v</span>enice</a>

        <nav class="navbar">
            <a href="#book">Venice</a>
            <a href="#packages">Places</a>
            <a href="#gallery">Events</a>
            
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn" <?php echo $loginButtonStyle; ?>></i>
        </div>


        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>

    </header>

    <!--header section finish-->
    
    <!--login form container-->

    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>

        <?php if(isset($_SESSION['error'])): ?>
            <script>
                alert("<?php echo $_SESSION['error']; ?>"); 
            </script>
            <?php unset($_SESSION['error']); ?> 
        <?php endif; ?>

        <form action="login-page/validate_login.php" method="post">
            <h3>Login</h3>
            <input type="text" name="username" class="box" placeholder="Enter your username" required="required"/>
            <input type="password" name="password" class="box" placeholder="Enter your password" required>
            <input type="submit" name="login" value="Login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
            <p>Forget password <a href="#">click here</a> </p>
            <p>Don't have an account? <a href="login-page/register.php">Register now</a> </p>
        </form>
    </div>  




    <!--home section start-->
    <section class="home" id="home">
        <div class="content">
            <h3>adventura is worthwhile</h3>
            <p>Getting lost in the mysterious streets of Venice is a sign of an adventure that can open up at any moment.</p>
            <a href="#" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/pexels-simone-bergamasco-11481154 (2160p).mp4"></span>
            <span class="vid-btn" data-src="images/pexels-olia-danilevich-9005759 (1080p).mp4"></span>
            <span class="vid-btn" data-src="images/pexels-ivan-khmelyuk-9557197 (2160p).mp4"></span>
            <span class="vid-btn" data-src="images/pexels-ivan-khmelyuk-9200974 (1080p).mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/pexels-simone-bergamasco-11481154 (2160p).mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    <!--home section end-->

    

    <!--book sectioon start-->
    <section class="book" id="book">
        <h1 class="heading">
            <span>v</span>
            <span>e</span>
            <span>n</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/architecture-boats-canal-canal-grande-687f64bd4e29cf9f0dcf03828e77827b.jpg" alt="">
            </div>
            <div class="information">
                <p>Venice is a city with a rich cultural heritage. It stands out for its historical and architectural significance. Landmarks like St. Mark's Basilica, Rialto Bridge, and Doge's Palace are integral parts of the city's architectural legacy. Venice also boasts a rich artistic tradition, hosting works by famous painters such as Titian and Tintoretto. Additionally, renowned composers like Vivaldi have lived and produced works in Venice. Carnival plays a significant role in the city's cultural life; the Venice Carnival is one of the world's most famous and attracts thousands of tourists every year. Venice's gastronomy is also rich, featuring traditional dishes made with seafood. The city also has a rich cultural heritage in crafts, artisanal traditions, and musical events. When these elements come together, Venice becomes renowned worldwide for its unique atmosphere and cultural diversity.</p>
            </div>
        
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/pexels-axp-photography-16411953.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">Welcome to the City of Canals</h2>
                <p> Venice is a city built on an archipelago in the north of the Adriatic Sea. The most important feature of the city is that it is full of canals. These canals form the basis of transportation in the city and offer a romantic atmosphere with gondola tours.
                Venice has been at the center of history, art and culture. A maritime republic for centuries, Venice has a rich cultural heritage. This heritage is reflected in the city's streets, canals and historic buildings.
                </p>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="image">
                <img src="images/pexels-pixabay-158441.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">What awaits you in Venice</h2>
                <p> There is something for every taste in Venice. Explore the historic buildings in Piazza San Marco, enjoy a spectacular view of the Grand Canal from the Rialto Bridge or soak up the romantic atmosphere of the city with a gondola ride.</p>
                <p>The islands of <strong>Murano and Burano</strong> are also a must-see on your trip to Venice. Murano is famous for its glassworks and Burano for its colorful houses.</p>
                <p>Venetian cuisine is also characterized by seafood and pasta. You can taste delicious Italian food in many restaurants and cafes in the city.</p>
            </div>
        </div>
    </section>

    <!--book section end-->
    
    <!--packages section start-->

    <section class="packages" id="packages">

        <h1 class="heading">
            <span>p</span>
            <span>l</span>
            <span>a</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">
            <div class="box">
                <img src="images/San-Marco.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i> San Marco</h3>
                    <p>Piazza San Marco is the most central square in Venice and one of the most important tourist attractions of the city. There are many important buildings in the square, such as the Basilica of San Marco, the Doge's Palace and the Campanile bell tower. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    
                </div>
            </div>
        </div>

        
        <div class="box-container">
            <div class="box">
                <img src="images/Rialto-Bridge.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i> Rialto Bridge</h3>
                    <p>The Rialto Bridge, the oldest bridge on the Grand Canal, is one of the symbols of Venice. From the bridge you can enjoy a magnificent view of the canal.  </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="images/pexels-andrea-de-santis-11478124.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i> Accademia Gallery</h3>
                    <p>The Accademia Gallery is one of the most important art galleries in Venice, where you can see works by masters such as Tintoretto, Titian and Giorgione. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                   
                </div>
            </div>
        </div>
   
    </section>
    
    
    <!--packages section end-->
    
    <!--gallery section start-->
    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>e</span>
            <span>v</span>
            <span>e</span>
            <span>n</span>
            <span>t</span>
            <span>s</span>
        </h1>

        <div class="box-container">
            
            <div class="box">
                <img src="images/karnav.jpg" alt="">
                <div class="content">
                    <h3>venice carnival</h3>
                    <p>It is held every year in February or March and is known for its masquerades, costumes and parades. </p>
                    <a href="venice-carnival/home.php" class="btn">See more</a>
                </div>
            </div>

            <div class="box">
                <img src="images/festival.jpg" alt="">
                <div class="content">
                    
                    <h3>Redeemer Festival</h3>
                    <p>The Feast of the Redeemer is a religious festival celebrated every year on the third Sunday in July. The festival commemorates the end of the plague epidemic and is celebrated with fireworks and boat processions.  </p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>

            <div class="box">
                <img src="images/kapak_221536.jpg" alt="">
                <div class="content">
                    <h3>Venice Film Festival</h3>
                    <p>The Venice Film Festival is one of the oldest film festivals in the world. It is held every year in September and hosts the premieres of important films from world cinema.  </p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>

            <div class="box">
                <img src="images/formula.jpg" alt="">
                <div class="content">
                    
                    <h3>Monza formula 1</h3>
                    <p>It is 258 kilometers from Venice. In Monza, you can visit the Autodromo Nazionale di Monza, one of Formula 1's most prestigious circuits </p>
                    <a href="MonzaFormula1/home.php" class="btn">See more</a>
                </div>
            </div>

            <div class="box">
                <img src="images/red-wine.jpg" alt="">
                <div class="content">
                    
                    <h3>Vino in Festa</h3>
                    <p>Venice's biggest wine festival. It takes place every year in May and hosts wine tastings and other events in many of the city's squares and parks.</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>

            <div class="box">
                <img src="images/boat-race-6065477_1920.jpg" alt="">
                <div class="content">
                    
                    <h3>Regata Storica</h3>
                    <p>Regata Storica is a rowing regatta organized to celebrate Venice's historic maritime tradition. </p>
                    <a href="RegataStorica/home.php" class="btn">See more</a>
                </div>
            </div>

        </div>


    </section>




    <!--gallery section end-->



     









    <!--custom jss file-->
    <script src="script.js"></script>
</body>
</html>