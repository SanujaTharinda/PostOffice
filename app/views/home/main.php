<!DOCTYPE html>
<html>
    <head>

        <title>Main User Homepage</title>
        
       <!--google fonts-->
         <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

        <!--font awesome-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--Animate CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />

        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>

        <!--style CSS-->
        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

        <!-- CSS Chat Box Style Sheet -->
        <link rel="stylesheet" href="<?php echo PUBLICROOT?>css/chat-box-styles.css"/>
    


        

    </head>

    <body class="index" >
        
            <!--NAVIGATION BAR-->
            <?php require_once(APPROOT."/views/navbar/navbar.php")?>

            <!--HOME section-->
            <section id="home">

                <div id="home-cover" class="wow fadeIn" data-wow-duration=".7s" data-wow-delay=".5s">

                    <div id="home-content-box">

                        <div id="home-content-box-inner">

                            <div class="container-fluid"> 
                                <div class="row wow fadeInUp " data-wow-duration=".7s" data-wow-delay=".5s">



                                <div class="col-md-4">
                                    <div class="Item">
                                        <div class="Item-icon">
                                            <i class="fa fa-group fa-4x"></i>
                                        </div>
                                        
                                        <div class="Item-title">
                                            <h3><a class="btn btn-lg btn-general btn-8" href=<?php echo MINOR_STAFF_DETAILS_CLICK ?> role="button">Minor Staff Details</a></h3>
                                        </div>

                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="Item">
                                        <div class="Item-icon">
                                            <i class="fa fa-check-square-o fa-4x"></i>
                                        </div>
                                        
                                        <div class="Item-title">
                                            <h3><a class="btn btn-lg btn-general btn-9" href=<?php echo ATTENDANCE_CLICK;?> role="button">Attendance</a></h3>
                                        </div>

                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="Item">
                                        <div class="Item-icon">
                                            <i class="fa fa-sign-out fa-4x"></i>
                                        </div>
                                        
                                        <div class="Item-title">
                                            <h3><a class="btn btn-lg btn-general btn-5" href="<?php echo LEAVE_MANAGEMENT_CLICK_ADMIN;?>" role="button">Leave Management</a></h3>
                                        </div>

                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="Item">
                                        <div class="Item-icon">
                                            <i class="fa fa-sitemap fa-4x"></i>
                                        </div>
                                        
                                        <div class="Item-title">
                                            <h3><a class="btn btn-lg btn-general btn-10" href=<?php echo DUTY_ARRANGEMENT_CLICK;?> role="button">Duty Arrangement</a></h3>
                                        </div>

                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="Item">
                                        <div class="Item-icon">
                                            <i class="fa fa-money fa-4x"></i>
                                        </div>
                                        
                                        <div class="Item-title">
                                            <h3><a class="btn btn-lg btn-general btn-11" href=<?php echo SALARY_CLICK;?> role="button">Salary Manangement</a></h3>
                                        </div>

                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="Item">
                                        <div class="Item-icon">
                                            <i class="fa fa-address-book fa-4x"></i>
                                        </div>
                                        
                                        <div class="Item-title">
                                            <a class="btn btn-lg btn-general btn-7" href=<?php echo EMPLOYEE_USER_DETAILS_CLICK ?> role="button">Employee User Details</a></h3>
                                        </div>

                                    
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
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <!--WOW JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script>

            <!--custom JS-->    
            <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>

             <!-- Messaging JS -->
             <script src="<?php echo PUBLICROOT; ?>js/messaging.js"></script>
        
    </body>

</html>