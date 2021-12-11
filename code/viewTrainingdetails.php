<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="event.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper{
            color:rgb(104,7,7)
        }
        .table{
            background-color:white;
        }
        table tr td{
            color:rgb(104,7,7)
        }

        table tr td:last-child{
            width: 10px;
        }
        .fa :last-child{
            padding: 40px ;
        }

    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>

<body>
<!-- navbar -->
    <div class="navbarr">
        <label class="brandd">Outrider Sports</label>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="viewStudents.php">Athletes</a></li>
            <li><a href="viewTrainingdetails.php">Session</a></li>
         

        </ul>
        
    </div>



    
</nav>
 
                    </div>
                    <?php
                    // Include config file
                    require_once 'dbconn.php';

                    // Attempt select query execution
                    $sql = 'SELECT * FROM training_session';
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Training Day</th>';
                            echo '<th>Training Time</th>';
                            echo '<th>Training Time</th>';
                            echo '<th>Team Name</th>';
                            echo '<th>Trainer Name</th>';
                            echo '<th>Trainer Email</th>';
                            echo '<th>Action</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['trainingDay'] . '</td>';
                                echo '<td>' . $row['trainingTime'] . '</td>';
                                echo '<td>' . $row['trainingVenue'] . '</td>';
                                echo '<td>' . $row['teamName'] . '</td>';
                                echo '<td>' . $row['trainerName'] . '</td>';
                                echo '<td>' . $row['trainerEmail'] . '</td>';
                                echo '<td>';

                                echo '<a href="updateSession.php?id=' .
                                    $row['id'] .
                                    '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="deleteSession.php?id=' .
                                    $row['id'] .
                                    '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo '</td>';
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
</html>