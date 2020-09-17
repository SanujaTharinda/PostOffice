<!DOCTYPE html>
<html>

<head>

    <title>About</title>

    <!--google fonts-->
    <link rel="stylesheet"
        href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

    <!--font awesome-->
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/font-awesome/css/font-awesome.min.css">

    <!--bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/Bootstrap/bootstrap.min.css">

    !--Animate CSS-->
        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/animate/animate.css">
   

    <!--Owl Carousel CSS-->
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/owl-carousel/owl.theme.default.min.css">

    <!--style CSS-->
    <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">
        <!-- CSS Chat Box Style Sheet -->
        <link rel="stylesheet" href="<?php echo PUBLICROOT?>css/chat-box-styles.css"/>
    

    <!-- Font Awesome -->

    <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>



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
    <script src="<?php echo PUBLICROOT; ?>js/jquery.js"></script>

    <!--bootstrap JS-->
    <script src="<?php echo PUBLICROOT; ?>js/Bootstrap/bootstrap.min.js"></script>

    <!--WOW JS-->
    <script src="<?php echo PUBLICROOT; ?>js/wow/wow.min.js"></script>

    <!--Owl Carousel JS-->
    <script src="<?php echo PUBLICROOT; ?>js/owl-carousel/owl.carousel.min.js"></script>

    <!--custom JS-->
    <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>

    <script src="<?php echo PUBLICROOT; ?>js/main.js"></script>

    <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>
     <!-- Messaging JS -->
     <script src="<?php echo PUBLICROOT; ?>js/messaging.js"></script>

</body>

</html>