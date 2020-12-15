<!DOCTYPE html>
 <html>
    <head>
    <title><?php echo SITENAME; ?></title>

        <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />


        <script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/style.css">

        <link rel="stylesheet" href="<?php echo PUBLICROOT; ?>css/responsive.css">


    </head>

    <body class="body-content">

        <nav class="navigationBar">

        <?php require_once(APPROOT."/views/navbar/navbar.php")?>

            <div class="search">
                <form action="<?php echo URLROOT; ?>MinorStaffDetailsController/minorStaffDetails" method="post"> 
                    <input type="text" name="find" oninput= 'instantSearch(this.value)' placeholder="Search employee" autocomplete="off">
                </form>
            </div>

            <div class="margin">
                <a href="<?php echo MINOR_STAFF_DETAILS_ADD_EMPLOYEE_CLICK; ?>"><button  class="themeBtn">Add Employee</button></a>
            </div>

        </nav> 

      

      <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        
                        <div class="card-body--">
                           <div class="table-stats ov-h">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Full Name</th>
                                        <th>NIC</th>
                                        <th>Address</th>
                                        <th>Telephone</th>
                                        <th>Gender</th>
                                        <th>First Date</th>
                                        <th>Registered Date</th>
                                        <th>Permenent Date</th>
                                        <th>Carrier</th>
                                        <th>Reg</th>
                                        <th>User</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody id="#minorStaffDetails-table-body"></tbody>
                                    
                                </table>

                                <small id="inform">No Minor Staff Details</small>


                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>


     <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
     <script src="<?php echo URLROOT; ?>js/minorStaff.js"></script>

     <script src="<?php echo PUBLICROOT; ?>js/custom.js"></script>
 
     </body>
 
 </html>
 
 