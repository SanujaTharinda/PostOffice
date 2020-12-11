
<!DOCTYPE html>
 <html>
    <head>
    <title></title>
       
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

        <?php require_once '../app/views/navbar/navbar.php'; ?>

        <div class="addDutyBar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dutyHeader">
                            <h5>OT Management</h5>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <div class="form-label">
                            <div class="ot-date">
                                <?php $date=date('Y/m/d'); ?>
                                <input type="text" value="<?php echo $date?>" name="date"  class="form-control text-center" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <a href="<?php echo URLROOT;?>OtManagementController/addOtPage"><button class="addDutyBtn">Add OT</button></a>
                    </div>

                    <div class="col-md-1">
                        <a href="<?php echo URLROOT;?>DutyArrangementController/dutyArrangement"><button class="addDutyBtn">Back</button></a>
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
                                                <th width=30%>Name</th>
                                                <th width=30%>Start Time</th>
                                                <th width=30%>End Time</th>
                                                
                                            </tr>
                                            </thead>
                                            
                                            <tbody id="ot_details_body">
                                        
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
        <script src="<?php echo PUBLICROOT;?>js/ot.js"></script>
        
        
    </body>
 
 </html>
 
 