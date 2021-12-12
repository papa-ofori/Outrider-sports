<?php
session_start();
include 'dbconn.php';

if (isset($_SESSION['login-email'])) {
    $email = htmlspecialchars($_SESSION['login-email']);
}

$studentDetails = retrieveTrainingDetails($email);

// print_r($studentDetails);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-image: url(../Images/image.png);">

    <!-- nav bar -->
    <div class="navbarr">
        <label class="brandd">Outrider Sports</label>
        <ul>
            <li><a href="index.html" onClick="alert('You maybe logged out')">Home</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="">Schedule</a></li>
            

        </ul>
    </div>

    <!-- card section left side -->
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <!-- <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div> -->
                                    <h6 class="f-w-600" style="color: orangered; font-size: 40px;"></h6>
                                    <p style="color: orangered; font-size: 40px;"></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>


                            <?php foreach ($studentDetails as $key => $value) {
                                echo '
    <!-- card section right side  -->
                            <div class="col-sm-8">
                                <div class="card-block">
                      
                            

                                    <!-- tittle user name and sports done by user -->
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Student Athlete Name : ' .
                                    $value['username'] .
                                    '</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">School</p>
                                            <h6 class="text-muted f-w-400">' .
                                    $value['school'] .
                                    '</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Sports</p>
                                            <h6 class="text-muted f-w-400"> ' .
                                    $value['sports'] .
                                    '</h6>
                                        </div>

                                        <!-- Training Day and Time -->
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Training Day and Time</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Training Day</p>
                                            <h6 class="text-muted f-w-400">' .
                                    $value['trainingDay'] .
                                    '</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Training Time</p>
                                            <h6 class="text-muted f-w-400"> ' .
                                    $value['trainingTime'] .
                                    '</h6>
                                        </div>
                                    </div>


                                    <!--Training Team name and venue -->
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Training Team details</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Venue</p>
                                            <h6 class="text-muted f-w-400">' .
                                    $value['trainingVenue'] .
                                    '</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Team name</p>
                                            <h6 class="text-muted f-w-400">' .
                                    $value['teamName'] .
                                    '</h6>
                                        </div>
                                    </div>

                                    <!-- Trainer Details -->
                                    
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Trainer</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Trainer Name</p>
                                            <h6 class="text-muted f-w-400">' .
                                    $value['trainerName'] .
                                    '</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Trainer Email</p>
                                            <h6 class="text-muted f-w-400">' .
                                    $value['trainerEmail'] .
                                    '</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
    
    ';
                            } ?>                
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- footer -->
<footer>
    <div class="footer-content">
        <h3>Outrider Sports</h3>
        <p>We are open everyday of the week from 12:00 pm to 5:00 pm. Visit our socials media handles for more enquiries. Emergency contancts: +233 55 174 7839 or +233 20 823 3139. "OUTRIDERS: WE GO INSIDE!!" </p>
        <ul class="socials">
            <li><a href="https://www.facebook.com/jrnba/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/right2dream"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://srfymca.org/jr-nba-co-ed-girls-only-leagues/"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCuA7P9O4_YEJHa6epPnWAbg"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://www.linkedin.com/company/european-platform-for-sport-innovation/"><i class="fa fa-linkedin-square"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy; <a href="#">Outrider Sports</a> </p>
    </div>

</footer>

</html>
