<?php session_start();
$username = $_SESSION['username'];
$userType = $_SESSION['usertype'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style CSS-->
    <!--google fonts-->
        <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

        <!--font awesome-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--Animate CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />
        
        <!-- Font Awesome -->

        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>

        <!--style CSS-->
        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

        <!-- responsive CSS -->
        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/responsive.css">
        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/profile.css">

    <title>Post Office</title>
</head>
<body>
    <!--NAVIGATION BAR-->
    <?php require_once(APPROOT."/views/navbar/navbar.php")?>

    <div class = 'profile container-fluid'>
        <h1 class = 'profile-heading'>Profile</h1>
        <hr>
        <div class="profile-middle">
            <h4>Username : <?php echo $username?></h4><br>
            <h4>User Type: <?php echo $userType?></h4>
        <hr>
        </div>
        <div>
            <div id = 'profile-bottom' username= <?php echo $username?>>
            <button type = 'submit' class='btn btn-sm btn-danger change-username' onclick = "changeUsernameClick()">Change Username</button>
            <button type = 'submit' class='btn btn-sm btn-danger change-password' onclick = "changePasswordClick()">Change Password</button>
            </div>
        </div>
    </div>

   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!--bootstrap JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--WOW JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script>

    <!-- counter -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-waypoints@2.0.5/waypoints.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous"></script>

    <!-- easing -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.js"></script>
    
    <!--custom JS-->    
    <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>

    <script src="<?php echo PUBLICROOT; ?>js/profile.js"></script>
    


</body>
</html>