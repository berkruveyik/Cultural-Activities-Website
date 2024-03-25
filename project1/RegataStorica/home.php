<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regata Storica</title>
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
            $query = "INSERT INTO ContactRegataStorica (name, message) VALUES ('$name', '$message')";
            if ($mysqli->query($query) === TRUE) {
                echo "Yeni kayıt başarıyla oluşturuldu.";
            } else {
                echo "Hata: " . $query . "<br>" . $mysqli->error;
            }
        }

        // Retrieve messages from the database
        $query = "SELECT name, message FROM ContactRegataStorica";
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

            
            $loginButtonStyle = isset($_SESSION['user']) ? 'style="display: none;"' : '';
        ?>
        <?php
            session_start(); 

            // Eğer kullanıcı giriş yaptıysa, kullanıcı adını ve çıkış butonunu gösterir
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
            <a href="#book">regata</a>
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
    <section class="home" id="home">
        <div class="content">
            <h3>Regata Storica</h3>
        </div>
        <div class="video-container">
            <video src="images/production_id_4935862 (2160p).mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    <!-- Home section end -->

    <!-- Book section start -->
    <section class="book" id="book">
        <h1 class="heading">
            <span>R</span>
            <span>e</span>
            <span>g</span>
            <span>a</span>
            <span>t</span>
            <span>a</span>
            <br>
            <span>s</span>
            <span>t</span>
            <span>o</span>
            <span>r</span>
            <span>i</span>
            <span>c</span>
            <span>a</span>
            
        </h1>
        <div class="row">
            <div class="image">
                <img src="images/1.jpg" alt="">
            </div>
            <div class="information">
                <p>Celebrating Venice's traditional culture and maritime heritage, the Regata Storica is an unforgettable event held every year on the first Sunday of September. This historic race features traditional gondola and boat races on Venice's waterways</p>
                <p><strong>Program:</strong> The event usually starts in the morning and continues throughout the day. Traditional boat races, costumed gondola races and other nautical shows take place throughout the day.</p>
                
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/52284264873_0501b70cf5_o.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">Monitoring Regata Storica Event</h2>
                <p><strong>Rialto Bridge and Canal Grande:</strong> One of the most popular spots to watch the Regata Storica is along the Rialto Bridge and Canal Grande. From these points you can watch traditional boat races and colorful parades.</p>
                <p><strong>St. Mark's Square: </strong> Another option is to watch the event from the open spaces in St. Mark's Square. From here, you can enjoy seeing the starting point of the gondola races and the maritime shows.</p>
                <p><strong>Private Boat Charter:</strong> If you are on a budget, renting a private boat and watching the Regata Storica from the water can be a great experience. This way you can get inside the races and take a private tour of Venice's waterways.</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="image">
                <img src="images/52299132362_8273e33fe2_o.jpg" alt="">
            </div>
            <div class="information">
                <h2 class="info">Discover Local Flavors and Cultural Events</h2>
                <p>During the event, you can enjoy the local cuisine of Venice. A glass of Prosecco or Aperol Spritz while watching the gondola races can make the experience even more memorable.
                   Besides the Regata Storica, you can also participate in other cultural events in Venice. For example, you can take the time to explore the city's museums, art galleries or historical sites.</p>
                
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