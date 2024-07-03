<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}

// Проверяем, есть ли отправка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $password = $_POST["password"];

  // Проверяем, существует ли пользователь в базе данных
  $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Авторизация успешна, устанавливаем куки
    setcookie("user", $login, time() + 3600);
    header("Location: profile.php");
    exit;
  } else {
    echo "Неверный логин или пароль.";
  }
}

$conn->close();
?>
