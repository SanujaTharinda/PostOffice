<?php 

session_start();
$username = $_SESSION['username'];


?>
<header>

                <nav class="navbar top-nav navbar-fixed-top" role="navigation">

                    <div class="container-fluid">

                        <div class="nav-wrapper">

                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <a class="navbar-brand" href="#">
                                    <img src="<?php echo PUBLICROOT; ?>img/navbarLogo.png" alt="logo">
                                </a>

                            </div>

                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav">
                                    
                                    <li><a href=<?php echo HOME_CLICK;?>>Home</a></li>
                                    <li><a href=<?php echo ABOUT_CLICK;?>>About</a></li>
                                    
                                    <li>
                                        <a class="nav-link " href="<?php echo PROFILE_CLICK;?>"> 
                                            <i class="far fa-user-circle fa-1x"></i>
                                            <?php echo $username;?>
                                        </a>
                                    </li>
                                    

                                    <li><a class="btn btn-logout" href="<?php echo LOGOUT_CLICK;?>">Logout</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </nav>

            </header>
