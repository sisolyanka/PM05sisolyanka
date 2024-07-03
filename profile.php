<?php
if (!isset($_COOKIE["user"])) {
  header("Location: index.php");
  exit;
}
echo "<h2>Добро пожаловать, " . $_COOKIE["user"] . "</h2>";
echo "<a href='logout.php'>Выйти</a>";
?>