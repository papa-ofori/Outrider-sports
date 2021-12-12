<?php
session_start();
ob_start();
include 'dbconn.php'; // Using database connection file here
ob_end_clean();
$error = ' ';

// Assigning the user's email to a session for use in another page
if (isset($_POST['loginemail'])) {
    $_SESSION['login-email'] = $_POST['loginemail'];
}
if (isset($_POST['login'])) {
    //Check when the login button is clicked
    $email = $_POST['loginemail'];
    $password = $_POST['loginPassword'];

    $check = mysqli_query(
        $link,
        "SELECT * from `registered_students_athletes` WHERE (`emailAdress`='$email' AND `user_password`='$password') "
    );
    if (mysqli_num_rows($check) == 1) {
        //Store variables in session
        $_SESSION['email'] = $email;
        header('location:schedule.php'); // redirects to members view page
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>
    window.alert('Wrong Username or password');
    window.location.href='signup.html';
    </script>";
    }
}

mysqli_close($link); // Close connection
?>
