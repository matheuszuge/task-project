<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "database_task";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}
mysqli_query($conn, "SET time_zone = '-03:00'");
mysqli_set_charset($conn, "utf8");
