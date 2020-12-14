<!DOCTYPE html>
 <html>
    <head>
    <title><?php echo SITENAME; ?></title> 

        <link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>Dependancies/MonthPicker.min.css">
        <script type="text/javascript" src="<?php echo URLROOT; ?>Dependancies/MonthPicker.min.js"></script>

        
         <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />


        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>

 

        <link rel="stylesheet" href="<?php echo URLROOT; ?>css/animate/animate.css"> 

        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/responsive.css">

    </head>

    <body class="body-content">


        <nav class="navigationBar">

        <?php require_once(APPROOT."/views/navbar/navbar.php")?>
            <div class="content pb-0">
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card"> 
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <div class="searchDate">
                                            <input id="DialogDemo" class='Default' type="text" name="cmonth" autocomplete="off">
                                            <input onclick="searchMonth()"  type="button" name="submit" value="Search" class="salarySearch">
                                        </div> 

                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
								                    <th>Name</th>
								                    <th>Basic</th>
								                    <th>Overtime</th>
								                    <th>Total</th>
                                                </tr>
                                                </thead>

                                                <tbody id="#salary-table-body"></tbody>
                                                
                                            </table>

                                            <small id="inform">No Salary Report</small>
    	                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <script src="<?php echo PUBLICROOT; ?>/js/salary.js"></script>

        <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>
 
    </body>
 
 </html>
 
 