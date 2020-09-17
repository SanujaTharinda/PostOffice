<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Basic</th>
		<th>Overtime</th>
		<th>Total</th>
	</tr>

<?php
	
    if(!empty($data)){
        foreach ($data as $row) { 

            echo "<tr><td>" . $row->id. "</td><td>" 
                . $row->name . "</td><td>"
                . $row->basic . "</td><td>"
                . $row->overtime . "</td><td>"
                . $row->total . "</td></tr>"; 
        }

    }else{
        
        echo "No record found";
    }
?>
</table>    
</body>
</html>