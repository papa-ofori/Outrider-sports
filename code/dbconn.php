<?php
// /* Database credentials. Assuming you are running MySQL
//  server with default setting (user 'root' with no password) */
// define('SERVER', 'localhost');
// define('USERNAME', 'Papa');
// define('PASSWORD', 'admin');
// define('DB_NAME', 'outridersports');
include 'database_credentials.php';
$result;
/* Attempt to connect to MySQL database */
$link = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

// Check connection
if ($link === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}

function retrieveTrainingDetails($email)
{
    global $result;
    global $link;

    $query = "SELECT `registered_students_athletes`.school, `registered_students_athletes`.sports, `registered_students_athletes`.username, `training_session`.trainingDay, `training_session`.trainingTime, `training_session`.trainingVenue, `training_session`.teamName, `training_session`.trainerName, `training_session`.trainerEmail 
    FROM `registered_students_athletes` 
    INNER JOIN `training_session` 
    ON `registered_students_athletes`.`trainerID` = `training_session`.id 
    WHERE `registered_students_athletes`.`emailAdress` = '$email';";

    $response = mysqli_query($link, $query);

    if ($response) {
        $result = mysqli_fetch_all($response, MYSQLI_ASSOC);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

?>
