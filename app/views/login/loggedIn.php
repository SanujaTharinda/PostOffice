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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/loggedIn.css">

    <title>Document</title>
</head>
<body class = 'login'>

    <div class = 'loggedIn'>
        <h1>Confirm</h1>
        <hr>
        <div>You are already logged in as <?php echo $username?>. You need to log out before logging in as a different user.</p>
        <hr>
        <form class="logout"method = 'post' action= <?php echo URLROOT."NavbarController/logout"?>>
            <button type = 'submit' class='btn btn-danger'>Logout</button>
        </form>
        <form class = 'cancel' method = 'get' action= <?php echo URLROOT."HomeController/homepage/$userType"?>>
            <button type = 'submit' class='btn btn-danger'>Cancel</button>
        </form>
    </div>


</body>
</html>