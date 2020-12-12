
<!DOCTYPE html>
 <html>
    <head>
    <title></title>
        
        <link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/animate/animate.css">
        <link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/owl-carousel/owl.theme.default.min.css">     
        <link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/normalize.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/themify-icons.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/pe-icon-7-filled.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/flag-icon.min.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/cs-skin-elastic.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/dutyArrangement.css">

        
    </head>

    <body class="body-content">

    <?php require_once APPROOT.'/views/navbar/navbar.php'; ?>

        <div class="addDutyBar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="dutyHeader">
                            <h5>Duty Arrangement</h5>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo URLROOT;?>DutyArrangementController/addDutyPage"><button class="addDutyBtn">Add Duty</button></a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo URLROOT;?>OtManagementController/otManagement"><button class="addDutyBtn">OT Management</button></a>
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

        <script src="<?php echo PUBLICROOT;?>js/jquery.js" ></script>
        <script src="<?php echo PUBLICROOT;?>js/Bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/wow/wow.min.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/custom.js"></script>
        <script src="<?php echo PUBLICROOT;?>js/duty.js"></script>
            
    </body>
 
 </html>
 
 