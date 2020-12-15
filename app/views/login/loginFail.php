<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/loginFail.css">

    <title>Login</title>
</head>
<body class = 'loginFail'>

    <div class = 'container-sm content'>

        <div class = 'container'>
            <h5>Incorrect Username or Password...</h5>
        </div>
        <div class = 'container'>
            <form method = 'post' action= <?php echo URLROOT."LoginController/login"?>>
                <button type = 'submit' class='btn btn-danger btn-block'>Ok</button>
            </form>
        </div>
    </div>


</body>
</html>