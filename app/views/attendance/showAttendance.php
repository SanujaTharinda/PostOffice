<!DOCTYPE html>
 <html>
    <head>
    <title>Show Attendance</title>

        <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />


        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/responsive.css">


    </head>

    <body class="body-content">

    <?php require_once(APPROOT."/views/navbar/navbar.php")?>

        <nav class="navigationBar">
            <div class="content pb-0">
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card"> 
                                <div class="card-body--">
                                    <div class="table-stats  ov-h">
                                    
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="col-md-8">
                                                <div class="searchDate">
                                                    <input type="date" oninput='searchDetails(this.value)' name="start_date" id="start_date">
                                                </div> 
                                            </div> 

                                            <div class="col-md-4">
                                                <a href="<?php echo URLROOT;?>AttendanceController/attendanceDashboard"><button class="themeBtn">Back</button></a>
                                            </div>

                                        </div>
                                    </div>



                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Full Name</th>
                                                    <th>Presence</th>
                                                    <th>Date</th>
                                                    <th>Special Note</th>
                                                </tr>
                                                </thead>

                                                <tbody id="#attendanceDetails-table-body"></tbody>
                                                
                                            </table>

                                            <small id="inform">No Attendance</small>
    	                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="<?php echo URLROOT; ?>public/js/getAttendanceDetails.js"></script>

        <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>
 
    </body>
 
 </html>
 
 