<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/attendance.css" ?>">

</head>
<body>
	<div class="dashboard"><h2>Dashboard</h2></div>

	<div class="row">
	  <div class="column">
	    <div class="card">
	    	<h3>30</h3>
	    	<p>Employees</p>
	    	<div class="container">
  
  <!-- Button to Open the Modal -->
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			    Show More
			  </button>

			  <!-- The Modal -->
			  <div class="modal fade" id="myModal">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Employees</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			          Modal body..
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			  
			</div>
	    </div>

	  </div>
	  <div class="column">
	    <div class="card">
	    	<h3>28</h3>
	    	<p>Present</p>
	    	<div class="container">
  
			  <!-- Button to Open the Modal -->
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			    Show More
			  </button>

			  <!-- The Modal -->
			  <div class="modal fade" id="myModal">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Present</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			          Modal body..
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			  
			</div>
	    </div>
	  </div>
	  <div class="column">
	    <div class="card">
	    	<h3>2</h3>
	    	<p>Absent</p>
	    	<div class="container">
  
			  <!-- Button to Open the Modal -->
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			    Show More
			  </button>

			  <!-- The Modal -->
			  <div class="modal fade" id="myModal">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Absent</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			          Modal body..
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			  
			</div>
	    </div>
	  </div>
	  <div class="column">
	    <div class="card">
	    	<h3>3</h3>
	    	<p>Late Comers</p>
	    	<div class="container">
  
			  <!-- Button to Open the Modal -->
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			    Show More
			  </button>

			  <!-- The Modal -->
			  <div class="modal fade" id="myModal">
			    <div class="modal-dialog">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <h4 class="modal-title">Late Comers</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			          Modal body..
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
			        
			      </div>
			    </div>
			  </div>
			  
			</div>
	    </div>
	  </div>
	</div>

	<div class="chart">
		<div class="column_chart">
	    	<div class="chart_card">
	    		<canvas id="mycanvas_1" width="300" height="300"></canvas>
	    		<p>Attendense-Today</p>
	    	</div>
	  	</div>
		<div class="column_chart">
	    	<div class="chart_card">
	    		<canvas id="mycanvas_2" width="300" height="300"></canvas>
	    		<p>Absentees-Last week</p>
	    	</div>
	  	</div>
	  	<div class="column_chart">
	    	<div class="chart_card">
	    		<canvas id="mycanvas_3" width="300" height="300"></canvas>
	    		<p>Late commers-last week</p>
	    	</div>
	  	</div>	
	</div>

	<div>
		<div>
			<h2>Analyze by employees</h2>
		</div>
		<div>
			<p>1.H.G.M.Vishvajith</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="<?php echo PUBLICROOT."js/Chart.js" ?>"></script>
	<script type="text/javascript" src=<?php echo PUBLICROOT."js/chartDetails.js";?>></script>
	

</body>
</html>