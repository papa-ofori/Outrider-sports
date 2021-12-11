<?php
/* Database credentials. Assuming you are running MySQL
 server with default setting (user 'root' with no password) */
define('SERVER', 'localhost');
define('USERNAME', 'Papa');
define('PASSWORD', 'admin');
define('DB_NAME', 'outridersports');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
?>
