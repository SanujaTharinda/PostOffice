
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

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" >
                                            Profile
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="index.php">Name</a>
                                            
                                        </div>
                                    </li>

                                    


                                    <li id = "message-button"><button >Message</button></li>
                                    <li><a class="btn btn-logout" href="<?php echo LOGOUT_CLICK;?>">Logout</a></li>

                                    
                                </ul>
                            </div>

                        </div>

                    </div>
                </nav>

            </header>
