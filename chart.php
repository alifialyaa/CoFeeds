<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'cofeeds';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$update_positif = '';
	$update_sembuh = '';
	$update_meninggal = '';

	//query to get data from the table
	$sql = "SELECT * FROM `update_kasus` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		
		$update_positif = $update_positif . '"'. $row['update_positif'].'",';
		$update_sembuh = $update_sembuh . '"'. $row['update_sembuh'] .'",';
		$update_meninggal = $update_meninggal . '"'. $row['update_meninggal'] .'",';
	}


	$update_positif = trim($update_positif,",");
	$update_sembuh = trim($update_sembuh,",");
	$update_meninggal = trim($update_meninggal,",");
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>Accelerometer data</title>

		<style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

			.container {
				color: #E8E9EB;
				background: #222;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style>

	</head>

	<body>	   
	    <div class="container">	
	    <h1>KASUS CORONA
		</h1> 
			<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [0, 1, 2, 3, 4, 5],
		            datasets: 
		            [{
		                label: 'Total Kasus',
		                data: [<?php echo $update_positif; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            },

		            {
		            	label: 'Total Sembuh',
		                data: [<?php echo $update_sembuh; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(0,255,255)',
		                borderWidth: 3	
		            },
					
					{
		            	label: 'Total Meninggal',
		                data: [<?php echo $update_meninggal; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(99,132,255)',
		                borderWidth: 3	
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
		        }
		    });
			</script>
	    </div>
	    
	</body>
</html>