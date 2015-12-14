<!doctype html>
<html>
	<head>
		<title>Tornadoes total versus max damage</title>
		<script src="http://www.chartjs.org/assets/Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<script src="http://libs.cartocdn.com/cartodb.js/v3/cartodb.js"></script>
		<style>
			canvas{
			}
		</style>
	</head>
	<body>
		<canvas id="canvas" height="450" width="600"></canvas>


	<script>

		var sql = cartodb.SQL({ user: 'andrew' });
        sql.execute("SELECT date_part('Month', t.date) as month, count(*) total, sum(damage)  damage FROM tornados t GROUP BY date_part('Month', t.date) ORDER BY date_part('Month', t.date) ASC").done(function(data) {
        	console.log(data)
        	var total = [];
        	var damage = [];
        	for (i in data.rows){
        		total.push(data.rows[i].total)
        		damage.push(data.rows[i].damage)
        	}
        	console.log(data)
			var lineChartData = {
				labels : ["January","February","March","April","May","June","July", "August", "September", "October", "November", "December"],
				datasets : [
					{
						fillColor : "rgba(220,220,120,0.5)",
						strokeColor : "rgba(220,220,120,1)",
						pointColor : "rgba(220,220,120,1)",
						pointStrokeColor : "#fff",
						data : damage
					},
					{
						fillColor : "rgba(151,187,205,0.5)",
						strokeColor : "rgba(151,187,205,1)",
						pointColor : "rgba(151,187,205,1)",
						pointStrokeColor : "#fff",
						data : total
					}
				]
			
			}

			var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	   })
	</script>
	</body>
</html>