<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venice Carnival</title>
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
            $query = "INSERT INTO contact (name, message) VALUES ('$name', '$message')";
            if ($mysqli->query($query) === TRUE) {
                echo "Yeni kayıt başarıyla oluşturuldu.";
            } else {
                echo "Hata: " . $query . "<br>" . $mysqli->error;
            }
        }

        // Retrieve messages from the database
        $query = "SELECT name, message FROM contact";
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
            session_start(); // Oturumu başlat

            // Eğer kullanıcı giriş yaptıysa, login-btn ikonunu gizle
            $loginButtonStyle = isset($_SESSION['user']) ? 'style="display: none;"' : '';
        ?>

        <?php
            session_start(); // Oturumu başlat

            // Eğer kullanıcı giriş yaptıysa, kullanıcı adını ve çıkış butonunu göster
            if(isset($_SESSION['user'])) {
                echo "<div class='logo'>";
                echo "<span>welcome, " . $_SESSION['user']['username'] . "</span>"; // Kullanıcı adını yazdır
                echo "<form action='../login-page/logout.php' method='post' class='logout-form'>";
                echo "<button type='submit' name='logout' class='btn'>Quit</button>";
                echo "</form>";
                echo "</div>";
            }
        ?>


        
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="../index.php" class="logo"><span>v</span>enice</a>
        <nav class="navbar">
            <a href="#book">karnival</a>
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
            <p>Don't have an account? <a href="login-page/register.php">Register now</a> </p>
        </form>
    </div>  

    <!-- Home section start -->
    <section class="home" id="home">
        <div class="content">
            <h3>venice carnival</h3>
        </div>
        <div class="video-container">
            <video src="images/pexels-mikhail-nilov-9750312 (Original).mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    <!-- Home section end -->

    <!-- Book section start -->
    <section class="book" id="book">
        <h1 class="heading">
            <span>v</span>
            <span>e</span>
            <span>n</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <br>
            <span>c</span>
            <span>a</span>
            <span>r</span>
            <span>n</span>
            <span>i</span>
            <span>v</span>
            <span>a</span>
            <span>l</span>
        </h1>
        <div class="row">
            <div class="image">
                <img src="images/pexels-helena-jankovičová-kováčová-6826433.jpg" alt="">
            </div>
            <div class="information">
                <p>The origins of the Carnival of Venice date back to the 12th century. It is believed that the carnival was first organized in 1162 to celebrate a victory over the Patriarchate of Aquileia. It is also thought that the carnival was held in Pagan traditions to welcome spring.</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/pexels-helena-jankovičová-kováčová-6826436.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">Features of Carnival</h2>
                <p><strong>Masks:</strong> Masks are the most important feature of the Venice Carnival. During the carnival, people attend masquerade balls and walk around the streets wearing masks. Masks eliminate social status and gender discrimination and make everyone equal.</p>
                <p><strong>Costumes:</strong> Carnival participants also wear colorful and flamboyant costumes. Costumes are often inspired by historical figures, fairytale heroes or fantastic creatures.</p>
                <p><strong>Parades:</strong> Many parades are organized during Carnival. The most popular parade is the "Volo dell'Angelo" in Piazza San Marco. In this parade, a person dressed as an angel rappels down from the Campanile bell tower.</p>
                <p><strong>Entertainment:</strong> Many concerts, operas, theater performances and other entertaining events are organized during Carnival. Acrobats, clowns and other street performers also perform on the streets.</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/pexels-helena-jankovičová-kováčová-6890276.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">When Carnival is organized</h2>
                <p> The Venetian Carnival starts in February or March each year, 40 days before the Christian feast of Easter, and ends the day before Ash Wednesday.</p>
                <h2 class="info">Things to Consider When Attending Carnival</h2>
                <p>During Carnival Venice is very crowded and accommodation prices increase. Therefore, it is important to book in advance.</p>
                <p>It is not mandatory to wear masks and costumes at the carnival, but it is recommended to wear masks and costumes to fully experience the atmosphere of the carnival.</p>
                <p>Store your bag and belongings carefully because of the crowds.</p>
                <p>Pay attention to the hygiene of food and drinks sold on the streets.</p>
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
                    <input type="text" name="name" id="name" placeholder="İsim">
                </div>
                <textarea name="message" id="message" placeholder="Mesaj" cols="30" rows="10"></textarea>
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
</style>