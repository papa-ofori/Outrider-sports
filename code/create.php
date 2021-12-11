<?php

if (isset($_POST['signup'])) {
    // print_r($_POST);
    // return;
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // getting user input and validating
    $username = validate($_POST['username']);
    $email = validate($_POST['emailAdress']);
    $gender = validate($_POST['gender']);
    $dateofBirth = validate($_POST['dateofBirth']);
    $school = validate($_POST['school']);
    $sports = validate($_POST['sports']);
    $userpassword = validate($_POST['user_password']);

    //print_r($_POST);
}
require 'database_credentials.php';
// connect to database
$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

//checking if a student has alreeady rigestered and inserting user input to database
$check_email = mysqli_query(
    $conn,
    "SELECT  * FROM registered_students_athletes where emailAdress = '$email'"
);
// var_dump($check_email);
if (mysqli_num_rows($check_email) > 0) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('You are already a member');
    window.location.href='index.html';
    </script>";
} else {
    $sql = "INSERT INTO registered_students_athletes(username, emailAdress, dateofBirth,  gender, school, sports, user_password) Values('$username','$email','$dateofBirth','$gender','$school','$sports','$userpassword')";

    echo $sql;
    if ($conn->query($sql) === true) {
        echo 'New record created successfully';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}
$conn->close();
?>
  
