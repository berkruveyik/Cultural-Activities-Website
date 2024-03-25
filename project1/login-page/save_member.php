<?php
session_start(); 

// Formdan gelen verileri alır
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';

// Veritabanı bağlantısı yapar
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$database = 'contact';

// MySQL bağlantısını oluşturur
$mysqli = new mysqli($host, $dbusername, $dbpassword, $database);

// Bağlantıyı kontrol eder
if ($mysqli->connect_error) {
    die("Veritabanına bağlanırken bir hata oluştu: " . $mysqli->connect_error);
}

// Kullanıcı adı ve şifre alanlarının dolu olduğunu kontrol eder
if (!empty($username) && !empty($password)) {
    // Veritabanına kullanıcıyı ekle
    $sql = "INSERT INTO login (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";

    if ($mysqli->query($sql) === TRUE) {
        // Başarıyla eklendiğinde başarılı mesajını oturum değişkenine kaydeder
        $_SESSION['success'] = "Kayıt başarıyla eklendi.";
    } else {
        // Hata oluştuğunda hata mesajını oturum değişkenine kaydeder
        $_SESSION['error'] = "Hata: " . $mysqli->error;
    }
} else {
    // Kullanıcı adı veya şifre alanları boşsa, hata mesajını kaydeeer
    $_SESSION['error'] = "Kullanıcı adı veya şifre boş olamaz.";
}


$mysqli->close();


header("Location: register.php");
exit();
?>
