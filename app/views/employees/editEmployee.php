<?php require_once APPROOT .'/views/inc/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body class="index">

    <form action="<?php echo URLROOT; ?>employees/editEmployee/<?php echo $data['id'];?>" method="post" class="userform" >
        
        <h1>Edit details</h1>

        <p>
           <label for="">* Full Name :</label>
           <input type="text" name="full_name" id="" <?php echo (!empty($data
                       ['name_err'])) ?'is-invalid' :''; ?> value="<?php echo $data['name']; ?>">
           <?php if($data['name_err']){ ?>
           <div class=error><?php echo $data['name_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* NIC Number :</label>
           <input type="text" name="nic" id="" value="<?php echo $data['NIC']; ?>">
           <?php if($data['NIC_err']){ ?>
           <div class=error><?php echo $data['NIC_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* Address :</label>
           <input type="text" name="address" id="" value="<?php echo $data['Address']; ?>">
           <?php if($data['Address_err']){ ?>
           <div class=error><?php echo $data['Address_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* Tel Number :</label>
           <input type="text" name="telephone" id="" value="<?php echo $data['Telephone']; ?>">
           <?php if($data['Telephone_err']){ ?>
           <div class=error><?php echo $data['Telephone_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* Gender :</label>
           <input type="text" name="gender" id="" value="<?php echo $data['gender']; ?>">
           <?php if($data['gender_err']){ ?>
           <div class=error><?php echo $data['gender_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* First Day :</label>
           <input type="text" name="first_day" id="" value="<?php echo $data['firstday']; ?>">
           <?php if($data['first_day_err']){ ?>
           <div class=error><?php echo $data['first_day_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* Registered Day :</label>
           <input type="text" name="registered_day" id="" value="<?php echo $data['registered_day']; ?>">
           <?php if($data['registered_day_err']){ ?>
           <div class=error><?php echo $data['registered_day_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* Permenent Day :</label>
           <input type="text" name="permenent_day" id="" value="<?php echo $data['permenent_day']; ?>">
           <?php if($data['permenent_day_err']){ ?>
           <div class=error><?php echo $data['permenent_day_err']; ?></div>
           <?php }?>
       </p>

       <p>
           <label for="">* Carrier :</label>
           <input type="text" name="carrier" id="" value="<?php echo $data['carrier']; ?>">
           <?php if($data['carrier_err']){ ?>
           <div class=error><?php echo $data['carrier_err']; ?></div>
           <?php }?>
       </p>

       <p>If only replacement job</p>

       <p>
           <label for="">* Register or Not :</label>
           <input type="text" name="reg" id="" value="<?php echo $data['reg']; ?>">
           <?php if($data['reg_err']){ ?>
           <div class=error><?php echo $data['reg_err']; ?></div>
           <?php }?>
       </p>

       <div class="sign">
           <button type="submit" name="save">Save</button>
       </div>

    </form>
</body>
</html>