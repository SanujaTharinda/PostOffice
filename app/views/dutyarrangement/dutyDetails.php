
<!DOCTYPE html>
 <html>
    <head>
    <title>DutyDetails</title>
    
    <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/dutyArrangement.css">

        
    </head>

    <body class="body-content duty-body">

    <?php require_once APPROOT.'/views/navbar/navbar.php'; ?>

        <div class="addDutyBar">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="dutyDetailHeader">
                            <h5>Duty Arrangement</h5>
                        </div>
                    </div>
                    

                    <div class="col-md-2">
                        <a href="<?php echo URLROOT;?>DutyArrangementController/addDutyPage"><button class="addDutyBtn">Add Duty</button></a>
                    </div>
                    
                </div>
            </div>
        </div>                                                                                                                                                                                      

        <div class="content-table">
            <div class="content pb-0">
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body--">
                                    <div class="table-stats ov-h">
                                        <table class="table  table-hover">
        
                                            <thead>
                                            <tr>
                                                <th width=10%>ID</th>
                                                <th width=20%>Name</th>
                                                <th width=16%>Start Time</th>
                                                <th width=16%>End Time</th>
                                                <th width=18%>Duty</th>
                                                <th width=10%></th>
                                                <th width=10%></th>
                                                
                                            </tr>
                                            </thead>
                                            
                                            <tbody id="duty_details_body">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>  
        
        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>
	    <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>
        <script src="<?php echo PUBLICROOT;?>js/Bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/wow/wow.min.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/custom.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/duty.js"></script>
            
    </body>
 
 </html>
 
 