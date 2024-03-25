<?php
session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "contact";


$mysqli = new mysqli($host, $dbusername, $dbpassword, $database);


if ($mysqli->connect_error) {
    die("Veritabanına bağlanırken bir hata oluştu: " . $mysqli->connect_error);
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL injection önlemek için güvenli sorgu yapısı
    $query = "SELECT * FROM login WHERE username = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Kullanıcı bilgilerini kontrol et
    
    if($row = $result->fetch_assoc()){
        $_SESSION['user'] = $row;
        header('Location: welcome.php'); 
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password"; 
        header('Location: ../index.php'); 
    }

}


$mysqli->close();
?>
