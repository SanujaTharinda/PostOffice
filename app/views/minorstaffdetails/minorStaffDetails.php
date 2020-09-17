<!DOCTYPE html>
 <html>
    <head>
      <title><?php echo SITENAME; ?></title>
      <link rel="stylesheet" type="text/css" href="<?php echo URLROOT?>css/style.css">
    </head>

    <body class="bodyBackground">
      

    <nav class="searchBar">

          <div class="search">
              <form method="post">
                  <input type="text" name="find" oninput= 'instantSearch(this.value)' placeholder="Search employee">
                 
                
              </form>
          </div>
          <div class="container-fluid  margin">
              <a href="<?php echo MINOR_STAFF_DETAILS_ADD_EMPLOYEE_CLICK; ?>"><button  class="themeBtn">Add Employee</button></a>
          </div>

      </nav>

    
     <table class="detailsTable">
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
             <th></th>
             <th></th>
         </tr>



       </thead>
       <tbody id="#minorStaffDetails-table-body">

       <?php

if(!empty($data)){

     foreach ($data as $row) {
?>


             <td><?php echo $row->id; ?></td>
             <input type="hidden" name="employee" value="<?php echo $row->id; ?>" />
             <td>
               <?php echo $row->full_name; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->nic; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->address; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->telephone; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->gender; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->firstday; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->registered_day; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->permenent_day; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->carrier; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
               <?php echo $row->reg; ?>
               <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
             </td>
             <td>
                <a href="<?php echo URLROOT; ?>employees/editEmployee/<?php echo $row->id; ?>"><button class="edit">Edit</button></a>
             </td>
             <td>
                <form  action="<?php echo URLROOT; ?>employees/deleteEmployee/<?php echo $row->id; 
            ?>" method="post">
            <input type="submit" value="Delete" class="delete">
            </form>
             </td>
           </tr>
<?php	} ?>
<?php }else{
    echo "No Search Result";
}
?>


       </tbody>
         
 
       
     </table>

     <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      

     <script src="<?php echo URLROOT; ?>public/js/main.js"></script>
      <!-- <script>
            <?php if($data['adding']=='success') {?>
                swal({
                title: "Admission successful!",
                text: "Employee added successfully!",
                icon: "success",
                button: "OK!",
                });
            <?php } ?>

        </script> -->
 
     </body>
 
 </html>
 
 