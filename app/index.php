<?php
$dsn = "mysql:host=db;dbname=myapp;charset=utf8mb4";
$user = "myuser";
$pass = "mypassword";

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "Connected to MySQL successfully via PHP-FPM + NGINX!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
echo 'Hi docker VEN.........';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Wellcome to Docker Application!</h1>
    <h3>Please check <a href="readme.php">readme.php</a> for more details....</h3>
    
    <br><p>Test auto deploy (1)....</p>
</body>
</html>
