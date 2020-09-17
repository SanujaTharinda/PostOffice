<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT?>css/style.css">

</head>
<body class="index">

    <script src="<?php echo URLROOT?>js/sweetAlert.js"></script>

    <script>
        <?php if($data['data']=='marked') {?>
            swal({
            title: "successful!",
            text: "Marked Attendance!",
            icon: "success",
            button: "OK!",
            });
        <?php } ?>

    </script>

    <div>

        <form action="<?php echo URLROOT; ?>pages/attendance" method="post" class="userform"  >

            <h1>Attendance Sheet</h1>

            <?php if($data['data'] == 'empty') {
                echo 'Attendance already marked.';
            } ?>

            </head>

            <body class="index">
                
            
            <table class="attendance">  
                    <tr>

                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Present</th>
                        <th>Absent</th>
                    
                    </tr>
            <?php

              foreach ($data['employee'] as $row) {
                ?>
            
                        <tr>
                        <td><?php echo $row->id; ?></td>
                        <input type="hidden" name="employee" value="<?php echo $row->id; ?>" />
                        <td>
                          <?php echo $row->full_name; ?>
                          <input type="hidden" name="employee_id" value="<?php echo $row->id; ?>" />
                        </td>
                        <td>
                          <input type="radio" class="radio_m" name="attendance_status<?php echo $row->id; ?>" value="Present" /></input>
                        </td>
                        <td>
                          <input type="radio" class="radio_m" name="attendance_status<?php echo $row->id; ?>" checked value="Absent" /></input>
                        </td>
                      </tr>
            <?php	} ?>


            </table>
            
            </body>

            <div class="submit">
              <button type="submit" name="save">Submit</button>
            </div>
        
        </form>

    </div>
    
</body>
</html>




