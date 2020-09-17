<?php require_once APPROOT .'/views/inc/header.php'; ?>
<html>
 <head>
  <title></title>

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

 </head>
 <body class="index">
    <form action="<?php echo URLROOT; ?>pages/showAttendance" method="post" class="userform">
        <h1>Attendance</h1>
            <div class="table-responsive">
                <div class="input-daterange">
                     <div class="col-md-4">
                        <input type="search" name="start_date" id="start_date" class="form-control" />
                    </div> 
                    <div class="col-md-4">
                        <input type="button" name="search" id="search" />
                    </div>
                    <div class="col-md-4">
                       <button type="submit" name=Search class="btn btn-info">Search</button>
                    </div>
                </div>
                
            </div>


            <div class="group">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">  
                    <thead>
                            <tr>

                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Presence</th>
                                <th>Date</th>
                            
                            </tr>
                        </thead>
                        <?php 
                        
                        if(!empty($data['data'])){
                            foreach ($data['data'] as $row) { 

                                echo "<tr><td>" . $row->employee_id. "</td><td>" . $row->full_name . "</td><td>"
                                    . $row->presence . "</td><td>"
                                    . $row->date . "</td></tr>"; 
                            }

                        }else if(!empty($data['empty'])){
                            
                            echo "No attendance record";
                        }
                        ?>


                    </table> 

                </div>
            </div>

    </form>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  if(start_date != '')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 
 
});
</script>


