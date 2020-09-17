
<?php 

	$dayArr = array_combine(range(01, 31), range(01, 31));

	$monthArr = array_combine(range(01, 12), range(01, 12));

	$yearArr = array_combine(range(2000, date("Y")), range(2000, date("Y")));

 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo URLROOT?>public/css/style.css">
</head>
<body>

	<script src="<?php echo URLROOT?>public/js/sweetAlert.js"></script>

	<script>
		<?php if($data['employee']=='success') {?>
			swal({
			  title: "Admission successful!",
			  text: "Employee added successfully!",
			  icon: "success",
			  button: "OK!",
			});
		<?php } ?>

	</script>
	<main>
		
		<form action="<?php echo URLROOT; ?>employees/addEmployee" method="post" class="userform"  >

					<h1>Data Form</h1>


					<p>
						<label for="">* Full Name :</label>
						<input type="text" name="full_name" id="" placeholder=" Full name"<?php echo 'value="'.$data['name'].'"'; ?>>
						<?php if($data['name_err']){ ?>
							<div class=error><?php echo $data['name_err']; ?></div>
						<?php }?>


					</p>
		
					<p>
						<label for="">* NIC Number :</label>
						<input type="text" name="nic" id="" placeholder=" National identity card number"<?php echo 'value="'.$data['NIC'].'"'; ?>>
						<?php if($data['NIC_err']){ ?>
							<div class=error><?php echo $data['NIC_err']; ?></div>
						<?php }?>
					</p>

					<p>
						<label for="">* Address :</label>
						<input type="text" name="address" id="" placeholder=" Address"<?php echo 'value="'.$data['Address'].'"'; ?>>
						<?php if($data['Address_err']){ ?>
							<div class=error><?php echo $data['Address_err']; ?></div>
						<?php }?>
					</p>

					<p>
						<label for="">* Tel Number :</label>
						<input type="text" name="telephone" id="" placeholder=" Telephone Number"<?php echo 'value="'.$data['Telephone'].'"'; ?>>
						<?php if($data['Telephone_err']){ ?>
							<div class=error><?php echo $data['Telephone_err']; ?></div>
						<?php }?>
					</p>

					<p>* Gender</p>
					
					<div class="radio-group">
						<input type="radio" value="male" class="radio_m" name="gender">Male</input>
						<br>
						<input type="radio" value="male" class="radio_f" name="gender">Female</input>
					</div>

					<p>* Date of Appoinment</p>

					<p>

					<h2>Date of first come</h2>
					<div class="calenderfirst">
							<label>Day:</label>
							<select name="day1">
								<?php foreach ($dayArr as $key => $value) {?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?php } ?> 
							</select>
							<label>Month:</label>
							<select name="month1">
								<?php foreach ($monthArr as $key => $value) {?>
								<option value="<?= $key ?>"><?= convertNoTomonth($value) ?></option>
								<?php } ?> 
							</select>						
							<label>Year:</label>
							<select name="year1">
								<?php foreach ($yearArr as $key => $value) {?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?php } ?> 
							</select>
	
					</div>
					</p>	
	
					<br>
					<p>
				    <div class="calenderfirst">
					<h2 class="cs2">Date of registered</h2> 
			 			<label>Day:</label>
			 			<select name="day2">
							<?php foreach ($dayArr as $key => $value) {?>
							<option value="<?= $key ?>"><?= $value ?></option>
							<?php } ?> 
						</select>

						<label>Month:</label>
			 			<select name="month2">
							<?php foreach ($monthArr as $key => $value) {?>
							<option value="<?= $key ?>"><?= convertNoTomonth($value) ?></option>
							<?php } ?> 
						</select>

						<label>Year:</label>
			 			<select name="year2">
							<?php foreach ($yearArr as $key => $value) {?>
							<option value="<?= $key ?>"><?= $value ?></option>
							<?php } ?> 
						</select>		
					</div>
					</p>
					<br>
					<p>

					<div class="calenderfirst">
					<h2>Date of permenent the appoinment</h2>
			 			<label>Day:</label>
			 				<select name="day3">
								<?php foreach ($dayArr as $key => $value) {?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?php } ?> 
							</select>

							<label>Month:</label>
			 				<select name="month3">
								<?php foreach ($monthArr as $key => $value) {?>
								<option value="<?= $key ?>"><?= convertNoTomonth($value) ?></option>
								<?php } ?> 
							</select>

							<label>Year:</label>
			 				<select name="year3">
								<?php foreach ($yearArr as $key => $value) {?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?php } ?> 
							</select>			
					</div>
					</p>
					<br>

					<p>
					<div class="job">
						<label>* Post</label>
						<select name=carrier>
							<option>--job state--</option>
							<option value="replacement">Replacement</option>
							<option value="not_replacement">Not Replacement</option>
						</select>
					</div>
					</p>
					<br>

					<p>
					<div class="jobtype">

						<label>If replacement post</label>
						<select name=reg>
							<option>--reg or not reg--</option>
							<option value="registered">Registered</option>
							<option value="not registered">Not Registered</option>
						</select>

					</div>
					</p>
					<br>

					<p>
					<div class="sign">
						<button type="submit" name="save">Save</button>
					</div>
					</p>
			</form>

	</main>

</body>
</html>
