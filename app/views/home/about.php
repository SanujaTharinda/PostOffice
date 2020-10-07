<!DOCTYPE html>
<html>

<head>

    <title>About</title>

    <!--google fonts-->
    <link rel="stylesheet"
        href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

    <!--font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--Animate CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />

    <!-- Owl Corousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css">
   
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>
    
    <!--style CSS-->
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

    <!-- CSS Chat Box Style Sheet -->
    <link rel="stylesheet" href="<?php echo PUBLICROOT?>css/chat-box-styles.css"/>
    
   



</head>

<body class="index">

    <!--NAVIGATION BAR-->
    <?php require_once(APPROOT."/views/navbar/navbar.php")?>

    <!--ABOUT-->
    <scetion id="about">

        <!--Right side with diagonal BG parallex-->
        <div id="about-bg-diagonal" class="bg-parallax"></div>

        <!--Left side with content-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="about-content-box">
                        <div id="about-content-box-outer">
                            <div id="about-content-box-inner">

                                <div class="title wow animated fadeInDown" data-wow-duration=".7s" data-wow-delay=".5s">
                                    <h3>Developed by Team IRIS</h3>
                                </div>

                                <div class="content-title wow animated fadeInDown" data-wow-duration=".7s"
                                    data-wow-delay=".5s">
                                    <h3>About Our Project</h3>
                                    <div class="content-title-underline"></div>
                                </div>

                                <div id="about-des" class="wow animated fadeInDown" data-wow-duration=".7s"
                                    data-wow-delay=".5s">
                                    <p>Music is the universal language of mankind. Where words fail, music speaks. Life
                                        is like a beautiful melody, only the lyrics are messed up. Music is the language
                                        of the spirit.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </scetion>

    <!--OUR TEAM-->
    <section id="our-team">

        <div id="team-content-box">

            <div class="content-title wow fadeInDown" data-wow-duration=".7s" data-wow-delay=".5s">
                <h3>Our Team</h3>
                <div class="content-title-underline"></div>
            </div>

            <div class="container">
                <div class="row wow fadeInUp " data-wow-duration=".7s" data-wow-delay=".5s">
                    <div class="col-md-12">

                        <div id="team-members" class="owl-carousel owl-theme">

                            <div class="team-member">
                                <img src="<?php echo PUBLICROOT; ?>img/team-1.jpg" class="img-responsive" alt="team member">
                                <div class="team-member-info text-center">

                                    <h4 class="team-member-name">Sanuja Tharinda</h4>

                                </div>
                            </div>

                            <div class="team-member">
                                <img src="<?php echo PUBLICROOT; ?>img/team-2.jpg" class="img-responsive" alt="team member">
                                <div class="team-member-info text-center">

                                    <h4 class="team-member-name">Maduka Vishvajith</h4>

                                </div>
                            </div>

                            <div class="team-member">
                                <img src="<?php echo PUBLICROOT; ?>img/team-3.jpg" class="img-responsive" alt="team member">
                                <div class="team-member-info text-center">

                                    <h4 class="team-member-name">Udith Kavinda</h4>

                                </div>
                            </div>

                            <div class="team-member">
                                <img src="<?php echo PUBLICROOT; ?>img/team-4.jpg" class="img-responsive" alt="team member">
                                <div class="team-member-info text-center">

                                    <h4 class="team-member-name">Shamila Nuwan</h4>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>


    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!--bootstrap JS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!--WOW JS-->
    <script src="https://cdn.boomcdn.com/libs/wow-js/1.3.0/wow.min.js"></script>

    <!--custom JS-->    
    <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>

    <!-- Messaging JS -->
    <script src="<?php echo PUBLICROOT; ?>js/messaging.js"></script>

     

</body>

</html>