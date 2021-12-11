<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="event.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="signin.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
   .table {
      margin: auto; width: 85%;
      background: rgb(243, 190, 170);
    

}
    

   
</style>
</head>

<body>

    <div class="navbarr">
        <label class="brandd">Outrider Sports</label>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="schedule.php">Schedule</a></li>
         

        </ul>
    </div>


                    <?php
                    // Include config file
                    require_once 'dbconn.php';

                    // Attempt select query execution
                    $sql = 'SELECT * FROM events';
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Event Name</th>';
                            echo '<th>Sports</th>';
                            echo '<th>Venue</th>';
                            echo '<th>Date</th>';
                            echo '<th>Time</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['event_name'] . '</td>';
                                echo '<td>' . $row['sports'] . '</td>';
                                echo '<td>' . $row['event_venue'] . '</td>';
                                echo '<td>' . $row['event_date'] . '</td>';
                                echo '<td>' . $row['event_time'] . '</td>';

                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo 'Oops! Something went wrong. Please try again later.';
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    </body>
<!-- footer content -->
<footer>
    <div class="footer-content">
        <h3>Outrider Sports</h3>
        <p>We are open everyday of the week from 12:00 pm to 5:00 pm. Visit our socials media handles for more enquiries. Emergency contancts: +233 55 174 7839 or +233 20 823 3139. "OUTRIDERS: WE GO INSIDE!!" </p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy; <a href="#">Outrider Sports</a> </p>
    </div>

</footer>
</html>