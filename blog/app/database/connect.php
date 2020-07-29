<?php

//Chay tren xampp
$host = 'localhost';
$user = 'namdzpro';
$pass = 'iuemmaimai';
$db_name = 'blog';

//Chay tren host
// $host = 'localhost';
// $user = 'id14381234_namdzpro';
// $pass = 'Maimaiiuem-2610';
// $db_name = 'id14381234_blog';

$conn = new MySQLi($host, $user, $pass, $db_name);


if ($conn->connect_error) {
    die('Database connect error:' . $conn->connect_error);
}
