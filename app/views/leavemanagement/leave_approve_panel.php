
<!DOCTYPE html>
<html>
<head>
	<title>Leave Details Dashboard</title>
   <link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha512-Yu3tDzlofwBycOX5qb6K4tGJKGD72LA/9ckyioo8plGOdLwIeESQgo+KY4M+gvBJvDguqYeweLVTIn+S/9ZC/Q==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dutyArrangement.css"?>">
    
</head>
<body class='leave-body'>
      <nav class="navigationBar">
      
      <?php require_once(APPROOT."/views/navbar/navbar.php");?>

      <?php
      $usertype = $_SESSION['usertype'];
      ?>

      </nav>

      <div class="addDutyBar">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="dutyHeader">
                            <h5>Leave Approve Panel</h5>
                        </div>
                    </div>
                    <div class="col-md-2.5">
                        <a href="<?php echo ADD_LEAVE_CLICK;?>"><button class="addDutyBtn">Add Leave</button></a>
                    </div>
                    <div class="col-md-2.5">
                        <a href="<?php echo LEAVE_TYPE_CLICK;?>"><button class="addDutyBtn">Leave Type</button></a>
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
                           <div class="table-stats  ov-h">
                              <table class="table table-hover t">
                                 <thead>
                                    <tr>
                                       <th width="5%">ID</th>
         									   <th width="15%">Employee Name</th>
         									   <th width="10%">Type</th>
                                       <th width="15%">From</th>
         									   <th width="15%">To</th>
         									   <th width="15%">Description</th>
         									   <th width="15%">Leave Status</th>
         									   <th width="10%"></th>
                                    </tr>
                                 </thead>
                                 <tbody id="leave_approve_tbody" usertype = <?php echo $usertype?>>
                                 </tbody>
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
      <script type="text/javascript" src="<?php echo PUBLICROOT; ?>js/leave_approve.js"></script>

      

</body>
</html>