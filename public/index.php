<?php
require_once 'vendor/autoload.php';

use App\Controllers\IPController;

$controller = new IPController();
$ipAddress = $controller->getIP();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Know Your IP Address</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Your IP Address</h1>
        <p>Your IP address is: <strong><?php echo htmlspecialchars($ipAddress); ?></strong></p>
    </div>
    <script src="public/js/script.js"></script>
</body>
</html>