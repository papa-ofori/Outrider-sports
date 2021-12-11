<?php
// Include config file
require_once 'dbconn.php';

// Define variables and initialize with empty values
$username = $emailAdress = $dateofBirth = $gender = $school = $sports = $user_password =
    '';
$username_err = $emailAdress = $dateofBirth = $gender_err = $school_err = $sports_err = $user_password_err =
    '';

// Processing form data when form is submitted
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Get hidden input value
    $id = $_POST['id'];

    // Validate name
    $input_username = trim($_POST['username']);
    if (empty($input_username)) {
        $username_err = 'Please enter full name.';
    } else {
        $username = $input_username;
    }

    // Validate address address
    $input_emailAdress = trim($_POST['emailAdress']);
    if (empty($input_emailAdress)) {
        $emailAdress_err = 'Please enter an email address.';
    } else {
        $emailAdress = $input_emailAdress;
    }

    // Validate dob
    $input_dateofBirth = trim($_POST['dateofBirth']);
    if (empty($input_dateofBirth)) {
        $dateofBirth_err = 'Please enter date of birth.';
    } else {
        $dateofBirth = $input_dateofBirth;
    }

    // Validate gender
    $input_gender = trim($_POST['gender']);
    if (empty($input_gender)) {
        $gender_err = 'Please gender.';
    } elseif (
        !filter_var($input_gender, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/(fe)?male/i'],
        ])
    ) {
        $gender_err = 'Please gender';
    } else {
        $gender = $input_gender;
    }

    // Validate school
    $input_school = trim($_POST['school']);
    if (empty($input_username)) {
        $school_err = 'Please a school.';
    } elseif (
        !filter_var($input_school, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[a-z][a-z ]*$/i'],
        ])
    ) {
        $school_err = 'Please enter a  school.';
    } else {
        $school = $input_school;
    }

    // Validate sports
    $input_sports = trim($_POST['sports']);
    if (empty($input_sports)) {
        $sports_err = 'Please a sports.';
    } elseif (
        !filter_var($input_sports, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[a-z][a-z ]*$/i'],
        ])
    ) {
        $sports_err = 'Please enter a sports.';
    } else {
        $sports = $input_sports;
    }

    // Validate password
    $input_user_password = trim($_POST['user_password']);
    if (empty($input_user_password)) {
        $user_password_err = 'Please enter password';
    } else {
        $user_password = $input_user_password;
    }

    // Check input errors before inserting in database
    if (
        empty($username_err) &&
        empty($emailAdress_err) &&
        empty($dateofBirth_err) &&
        empty($gender_err) &&
        empty($school_err) &&
        empty($sports_err) &&
        empty($user_password_err)
    ) {
        // Prepare an update statement
        $sql =
            'UPDATE `registered_students_athletes` SET `username`=?,`emailAdress`=?,`dateofBirth`=?,`gender`=?,`school`=?,`sports`=?,`user_password`=? WHERE `id`=?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters

            // Set parameters
            $param_username = $username;
            $param_emailAdress = $emailAdress;
            $param_dateofBirth = $dateofBirth;
            $param_gender = $gender;
            $param_school = $school;
            $param_sports = $sports;
            $param_user_password = $user_password;
            $param_id = $id;

            mysqli_stmt_bind_param(
                $stmt,
                'sssssssi',
                $param_username,
                $param_emailAdress,
                $param_dateofBirth,
                $param_gender,
                $param_school,
                $param_sports,
                $param_user_password,
                $param_id
            );

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header('location: viewStudents.php');
                exit();
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Get URL parameter
        $id = trim($_GET['id']);

        // Prepare a select statement
        $sql = 'SELECT * FROM registered_students_athletes WHERE id = ?';
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'i', $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                     contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $username = $row['username'];
                    $emailAdress = $row['emailAdress'];
                    $dateofBirth = $row['dateofBirth'];
                    $gender = $row['gender'];
                    $school = $row['school'];
                    $sports = $row['sports'];
                    $user_password = $row['user_password'];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header('location: error.php');
                    exit();
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header('location: error.php');
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update student registration table.</p>
                    <form action="" method="POST">
                        <div class="form-group">


                    <input type="hidden" name="id" value="<?php echo $_GET[
                        'id'
                    ]; ?>">
                        <!-- Edit box for first name-->
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="username" class="form-control 
                            <?php echo !empty($username_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>

                        <!-- Edit box for email-->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="emailAdress" class="form-control 
                            <?php echo !empty($emailAdress_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $emailAdress; ?>">
                            <span class="invalid-feedback"><?php echo $emailAdress_err; ?></span>
                        </div>

                        <!-- Edit box for dob-->
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dateofBirth" class="form-control 
                            <?php echo !empty($dateofBirth_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $dateofBirth; ?>">
                            <span class="invalid-feedback"><?php echo $dateofBirth_err; ?></span>
                        </div>
                        
                        <!-- Edit gender -->
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control
                             <?php echo !empty($gender_err)
                                 ? 'is-invalid'
                                 : ''; ?>" value="<?php echo $gender; ?>">
                            <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                        </div>

                        <!-- school -->
                        <div class="form-group">
                            <label>School</label>
                            <input type="text" name="school" class="form-control 
                            <?php echo !empty($school_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $school; ?>">
                            <span class="invalid-feedback"><?php echo $school_err; ?></span>
                        </div>


                       <!-- sports -->
                       <div class="form-group">
                            <label>Sports</label>
                            <input type="text" name="sports" class="form-control 
                            <?php echo !empty($sports_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $sports; ?>">
                            <span class="invalid-feedback"><?php echo $sports_err; ?></span>
                        </div>

                      <!-- user_password -->
                     <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="user_password" class="form-control 
                            <?php echo !empty($user_password_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $user_password; ?>">
                            <span class="invalid-feedback"><?php echo $user_password_err; ?></span>
                        </div>

               


                        
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="viewStudents.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
