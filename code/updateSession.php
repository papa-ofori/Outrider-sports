<?php
// Include config file
require_once 'dbconn.php';

// Define variables and initialize with empty values
$trainingDay = $trainingTime = $trainingVenue = $teamName = $trainerName = $trainerEmail =
    '';
$trainingDay_err = $trainingTime_err = $trainingVenue_err = $teamName_err = $trainerName_err = $trainerEmail_err =
    '';

// Processing form data when form is submitted
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Get hidden input value
    $id = $_POST['id'];

    // Validate Day
    $input_trainingDay = trim($_POST['trainingDay']);
    if (empty($input_trainingDay)) {
        $trainingDay_err = 'Please enter training day.';
    } else {
        $trainingDay = $input_trainingDay;
    }

    // Validate address train time
    $input_trainingTime = trim($_POST['trainingTime']);
    if (empty($input_trainingTime)) {
        $trainingTime_err = 'Please enter training time.';
    } else {
        $emailAdress = $input_emailAdress;
    }

    // Validate training Venue
    $input_trainingVenue = trim($_POST['trainingVenue']);
    if (empty($input_trainingVenue)) {
        $trainingVenue_err = 'Please enter venue.';
    } else {
        $trainingVenue = $input_trainingVenue;
    }

    // Validate training Venue
    $input_teamName = trim($_POST['teamName']);
    if (empty($input_teamName)) {
        $teamName_err = 'Please enter team Name.';
    } else {
        $teamName = $input_teamName;
    }

    // Validate Trainer Name
    $input_trainerName = trim($_POST['trainerName']);
    if (empty($input_trainerName)) {
        $trainerName_err = 'Please enter trainer name.';
    } else {
        $trainerName = $input_trainerName;
    }

    // Validate Trainer Email
    $input_trainerEmail = trim($_POST['trainerEmail']);
    if (empty($input_trainerEmail)) {
        $trainerEmail_err = 'Please enter email.';
    } else {
        $trainerEmail = $input_trainerEmail;
    }

    // Check input errors before inserting in database
    if (
        empty($trainingDay_err) &&
        empty($trainingTime_err) &&
        empty($trainingVenue_err) &&
        empty($teamName_err) &&
        empty($trainerName_err) &&
        empty($trainerEmail_err)
    ) {
        // Prepare an update statement
        $sql =
            'UPDATE `training_session` SET `trainingDay`=?,`trainingTime`=?,`trainingVenue`=?,`teamName`=?,`trainerName`=?,`trainerEmail`=? WHERE `id`=?';

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters

            // Set parameters
            $param_trainingDay = $trainingDay;
            $param_trainingTime = $trainingTime;
            $param_trainingVenue = $trainingVenue;
            $param_teamName = $teamName;
            $param_trainerName = $trainerName;
            $param_trainerEmail = $trainerEmail;
            $param_id = $id;

            mysqli_stmt_bind_param(
                $stmt,
                'ssssssi',
                $param_trainingDay,
                $param_trainingTime,
                $param_trainingVenue,
                $param_teamName,
                $param_trainerName,
                $param_trainerEmail,
                $param_id
            );

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header('location: viewTrainingdetails.php');
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
        $sql = 'SELECT * FROM training_session WHERE id = ?';
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
                    $username = $row['trainingDay'];
                    $emailAdress = $row['trainingTime'];
                    $dateofBirth = $row['trainingVenue'];
                    $gender = $row['teamName'];
                    $school = $row['trainerName'];
                    $sports = $row['trainerEmail'];
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
                            <label>Training Day</label>
                            <input type="text" name="trainingDay" class="form-control 
                            <?php echo !empty($trainingDay_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $trainingDay; ?>">
                            <span class="invalid-feedback"><?php echo $trainingDay_err; ?></span>
                        </div>

                        

                        <!-- Edit box for training Time-->
                        <div class="form-group">
                            <label>Training Time</label>
                            <input type="time" name="trainingTime" class="form-control 
                            <?php echo !empty($trainingTime_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $trainingTime; ?>">
                            <span class="invalid-feedback"><?php echo $trainingTime_err; ?></span>
                        </div>

                         <!-- Edit box for training Venue-->
                        <div class="form-group">
                            <label>Training Venue</label>
                            <input type="text" name="trainingVenue" class="form-control 
                            <?php echo !empty($trainingVenue_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $trainingVenue; ?>">
                            <span class="invalid-feedback"><?php echo $trainingVenue_err; ?></span>
                        </div>
                        
                        
                         <!-- Edit box for team Name-->
                         <div class="form-group">
                            <label>Team Name</label>
                            <input type="text" name="teamName" class="form-control 
                            <?php echo !empty($teamName_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $teamName; ?>">
                            <span class="invalid-feedback"><?php echo $teamName_err; ?></span>
                        </div>

                        <!-- Edit box for team Name-->
                         <div class="form-group">
                            <label>Trainer Name</label>
                            <input type="text" name="trainerName" class="form-control 
                            <?php echo !empty($trainerName_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $trainerName; ?>">
                        <span class="invalid-feedback"><?php echo $trainerName_err; ?></span>
                        </div>
                        

                        <!-- Edit box for team Name-->
                        <div class="form-group">
                            <label>Trainer Email</label>
                            <input type="text" name="trainerEmail" class="form-control 
                            <?php echo !empty($trainerName_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $trainerEmail; ?>">
                            <span class="invalid-feedback"><?php echo $trainerEmail_err; ?></span>
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
