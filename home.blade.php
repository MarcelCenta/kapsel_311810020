<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">

        var result = <?php echo $review?>;
        google.charts.load('current', {'packages':['corechart']});
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(function() {drawChart(result);});

        function drawChart(result) {
			// Create Data
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Year');
			data.addColumn('number', 'Reviews');
			var dataArray = [];
					

			$.each(result, function(i, obj){
				dataArray.push([obj.year, parseInt(obj.reviews)]);
			});

			data.addRows(dataArray);

			// Pie Chart
			var piechart_options = {
				title: 'Pie Chart:',
				legend: {
					position: 'bottom'
				}
			};
			var piechart = new google.visualization.PieChart(document.getElementById('piechart'));

			piechart.draw(data, piechart_options);
			
			// Bar Chart
			var barchart_options = {
				title: 'Bar Chart:',
				legend: {position:'none'}
			};
			var barchart = new google.visualization.BarChart(document.getElementById('barchart'));

			barchart.draw(data, barchart_options);
			
			// Table Chart
			var table = new google.visualization.Table(document.getElementById('table_div'));
			table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});

        }
    
    </script>
  </head>
  <body>
	<h1>Google Chart JS dengan Laravel</h1>
    <table class="columns" cellpadding="8 8 8 8" cellspacing="8 8 8 8" style="width: 50%; height:auto;"> 
        <tr>
            <td>
                <div id="piechart" style="border: 2px solid #ccc"></div>
				<h4>Berdasarkan hasil dari Pie Chart. <br>Tahun 2019 (Warna Ungu) memiliki area yang lebih luas dibandingkan tahun lainnya. 
				Namun dikarenakan jumlah variabel tahun yang lumayan bervariasi, hampir tidak terlihat perbedaannya.</h4>
            </td>
        </tr>
        <tr>
            <td>
                <div id="barchart" style="border: 2px solid #ccc"></div>
				<h4>Berdasarkan hasil dari Bar Chart. <br>Jika dilihat secara langsung tahun 2013 dan tahun 2019 hampir tidak memiliki
				perbedaan, namun sebenarnya tahun 2019 lah yang memiliki jumlah review yang paling tinggi</h4>
            </td>
        </tr>
		<tr>
            <td>
                <div id="table_div" style="border: 2px solid #ccc"></div>
            </td>
        </tr>
    </table>
  </body>
</html>