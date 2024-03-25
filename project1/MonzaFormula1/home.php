<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monza formula 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="stylee.css">
    <style>
        /* Custom CSS for displaying comments */
        .comment {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .comment p {
            margin: 5px 0;
        }
    </style>
    <?php

        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'contact';

        // Connect to MySQL database
        $mysqli = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($mysqli->connect_error) {
            die("Veritabanına bağlanırken bir hata oluştu: " . $mysqli->connect_error);
        }

        // Check if form submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $message = $_POST['message'];

            // Validate and sanitize data
            $name = $mysqli->real_escape_string($name);
            $message = $mysqli->real_escape_string($message);

            // Insert data into the database
            $query = "INSERT INTO contactmonza (name, message) VALUES ('$name', '$message')";
            if ($mysqli->query($query) === TRUE) {
                echo "Yeni kayıt başarıyla oluşturuldu.";
            } else {
                echo "Hata: " . $query . "<br>" . $mysqli->error;
            }
        }

        // Retrieve messages from the database
        $query = "SELECT name, message FROM contactmonza";
        $result = $mysqli->query($query);
        $comments = array();
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mesajları veritabanına kaydetme işlemi
        
            // Sayfayı yeniden yönlendirme
            header("Location: ".$_SERVER['PHP_SELF']);
            exit(); // Yönlendirmeden sonra kodun çalışmasını durdurmak için
        }
        
        // Bağlantıyı kapat
        
        $mysqli->close();
    ?>
</head>
<body>
    <!-- Header section start -->
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
                echo "<span>welcome, " . $_SESSION['user']['username'] . "</span>"; 
                echo "<form action='../login-page/logout.php' method='post' class='logout-form'>";
                echo "<button type='submit' name='logout' class='btn'>Quit</button>";
                echo "</form>";
                echo "</div>";
            }
        ?>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="../index.php" class="logo"><span>v</span>enice</a>
        <nav class="navbar">
            <a href="#book">monza</a>
            <a href="#contact">forum</a>
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
    <!-- Header section finish -->

    <!-- Login form container -->
    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>

        <?php if(isset($_SESSION['error'])): ?>
            <script>
                alert("<?php echo $_SESSION['error']; ?>"); 
            </script>
            <?php unset($_SESSION['error']); ?> 
        <?php endif; ?>

        <form action="../login-page/validate_login.php" method="post">
            <h3>Login</h3>
            <input type="text" name="username" class="box" placeholder="Enter your username" required="required"/>
            <input type="password" name="password" class="box" placeholder="Enter your password" required>
            <input type="submit" name="login" value="Login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
            <p>Forget password <a href="#">click here</a> </p>
            <p>Don't have an account? <a href="../login-page/register.php">Register now</a> </p>
        </form>
    </div>  

    <!-- Home section start -->
    <section class="homee" id="home">
        <div class="content">
            <h3>Monza</h3>
        </div>
        <div class="video-container">
            <video src="images/f1.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    <!-- Home section end -->

    <!-- Book section start -->
    <section class="book" id="book">
        <h1 class="heading">
            <span>m</span>
            <span>o</span>
            <span>n</span>
            <span>z</span>
            <span>a</span>
            <br>
            <span>f</span>
            <span>o</span>
            <span>r</span>
            <span>m</span>
            <span>u</span>
            <span>l</span>
            <span>a</span>
            <br>
            <span>1</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="images/1678044570308.jpg.avif" alt="">
            </div>
            <div class="information">
                <p>Monza is a city in the Lombardy region of Italy, known for its famous Formula 1 circuit. It is easy to reach from Venice and is a great place for an exciting Formula 1 experience. </p>
                <h2 class="info">Getting from Venice to Monza</h2>
                <p><strong>By train:</strong> Getting from Venice to Monza by train is a very common option. You can reach Milan by train from Santa Lucia Train Station in Venice. Once in Milan, you can take a short train ride to Monza from Milan's Garibaldi or Centrale Train Stations.</p>
                <p><strong>By car:</strong>If you want to drive from Venice to Monza, follow the A4 highway towards Milan. Once in Milan, you can reach Monza by following the direction signs to Monza. However, driving inside Monza can be difficult, so it is important to plan parking spaces in advance.</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/2023-Formula1-Red-Bull-Racing-RB19-002-2160.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">Accommodation in Monza</h2>
                <p>If you want to stay in Monza, consider nearby hotels or Airbnb options. Formula 1 weekends may require hotels and accommodation to be booked early, so it is important to book in advance if possible.</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/pexels-prat-clement-11202308.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">Formula 1 Experience in Monza</h2>
                <p><strong>Monza Circuit Tour:</strong> When you arrive in Monza, it can be exciting to take a lap around the circuit. On certain days, track tours are organized and you can see the legendary times of the Formula 1 circuit up close.</p>
                <p><strong>Visit the Parks:</strong> If you want to get away from the excitement of Formula 1, you can visit the beautiful parks in Monza. The Royal Park of Monza (Parco di Monza) is the perfect place to relax and enjoy nature with its stunning views.</p>
                <p><strong>Discover Local Flavors:</strong> Enjoy Italian cuisine in Monza. Try risotto, polenta and other Italian delicacies at local restaurants. Also, don't forget to enjoy a cup of espresso in the city's cafes.</p>
            </div>
        </div>
    </section>
    <!-- Book section end -->

    <!-- Contact section start -->
    <section class="contact" id="contact">
        <h1 class="heading">
            <span>f</span>
            <span>o</span>
            <span>r</span>
            <span>u</span>
            <span>m</span>
            
        </h1>
        <div class="row">
            <div class="image">
                <img src="images/Gemini_Generated_Image.jpg" alt="">
            </div>
            <form method="post" onsubmit="return validateForm()">
                <div class="inputBox">
                    <input type="text" name="name" id="name" placeholder="name">
                </div>
                <textarea name="message" id="message" placeholder="message" cols="30" rows="10"></textarea>
                <input type="submit" value="Gönder" class="btn"/>
            </form>
        </div>
           
        <script>
            function validateForm() {
                var name = document.getElementById("name").value;
                var message = document.getElementById("message").value;

                if (name.trim() === '' || message.trim() === '') {
                    alert("Please fill in all fields.");
                    return false; 
                }
                return true; 
            }
        </script>
        <!-- Display comments -->
        <div class="comments">
            <?php foreach ($comments as $comment) : ?>
                <div class="comment">
                    <div class="comment-info">
                        <span class="comment-name"><?php echo $comment['name']; ?>:</span>
                    </div>
                    <div class="comment-message">
                        <?php echo $comment['message']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
    <!-- Contact section end -->
    
    <!-- Custom JavaScript file -->
    <script src="../script.js"></script>
</body>
</html>


<style>
    .comments {
    margin-top: 20px;
}

.comment {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.comment-info {
    font-weight: bold;
    margin-bottom: 5px;
}
.comment-info span{
    font-size: 1.7rem;
    padding: 1rem 0;
    color: #555;
}
.comment-message {
    font-size: 1.7rem;
    padding: 1rem 0;
    color: #555;
}

.home{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content:center ;
    flex-flow: column;
    position: relative;
   z-index: 0;

}

.home   .content{
    text-align: center;

}

.home   .content h3{
    font-size: 4.5rem;
    color: azure;
    text-transform: uppercase; 
    text-shadow: 0 .3rem .5rem rgba(0, 0, 0, .1);
}
</style>