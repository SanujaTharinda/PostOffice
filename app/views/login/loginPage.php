<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>User Login</title>
       

         <!--google fonts-->
        <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

        <!--font awesome-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--Animate CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />

        <!--style CSS-->
        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

    </head>
    <body>
        <body class="login">

        <header>
            <nav class="navbar nav-top navbar-fixed-top" role="navigation">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <div class="navbar-brand">
                          
                        </div>
                    </div>

                    

                </div>
            </nav>
        </header>   
        
        <div class="login-box">
            
            <img src="<?php echo PUBLICROOT; ?>img/avatar.png" class="avatar">
            <form action="<?php echo LOGIN_SUBMIT; ?>" method="post">

                    <p>
                        <h1>LOG IN</h1>
                    </p>

                    <p>
                        <label for="">Username:</label>
                        <input type="text" name="email" id="email" placeholder="Email Address">
                    </p>

                    <p>
                        <label for="">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </p>

                    <p>
                        <button type="submit" name="submit">Login</button>
                    </p>




            </form>

        </div>

        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <!--bootstrap JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Ain Krnna -->

        <script src="<?php echo PUBLICROOT."/js/log.js" ?>"></script>

    </body>
</html>
