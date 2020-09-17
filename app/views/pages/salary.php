<!DOCTYPE html>
<html>
<head>
	<title>salary report</title>

	<link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/MonthPicker.min.css">
	<script type="text/javascript" src="../js/MonthPicker.min.js"></script>

</head>

<body>
	<h1>salary report</h1>

	<div id="Modal">
		<form action="<?php echo URLROOT; ?>pages/salary" method="post">
				
				Month:

				<input id="DialogDemo" class='Default' type="text" name="cmonth">
			   		
				<button type="submit" name="submit">search</button>
			
    	</form>
	</div>

	<script>
	    $( document ).ready(function() {
		 $('#DialogDemo').MonthPicker({ MaxMonth: -1, OnAfterChooseMonth: function(){ 
		    //alert($(this).val());
		    } });
	   });
	</script>

</body>
</html>