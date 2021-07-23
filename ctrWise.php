<?php
  $con= mysqli_connect("localhost","root","","londry_db");
  echo "okko0";
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['District', 'Male','Female'],
          

<?php

                $rt = mysqli_query($con,"SELECT city,
                COUNT(CASE WHEN gender='Male' THEN 1  END) As Male,
                COUNT(CASE WHEN gender='Female' THEN 1  END) As Female
                FROM trainer GROUP BY city");

            while ($row = mysqli_fetch_array($rt)) { 

                 echo "['".$row["city"]."',".$row["Male"]."," . $row["Female"] ."],";  
            }
            ?>



        ]);

        var options = {
          title : 'Polpulation According to CITY From Trainers',
          vAxis: {title: 'Male'},
          hAxis: {title: 'Female'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<?php
  $con= mysqli_connect("localhost","root","","londry_db");
  echo "okko0";
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['District', 'Male','Female'],
          

<?php

                $rt = mysqli_query($con,"SELECT city,
                COUNT(CASE WHEN gender='Male' THEN 1  END) As Male,
                COUNT(CASE WHEN gender='Female' THEN 1  END) As Female
                FROM abhyasi GROUP BY city");

            while ($row = mysqli_fetch_array($rt)) { 

                 echo "['".$row["city"]."',".$row["Male"]."," . $row["Female"] ."],";  
            }
            ?>



        ]);

        var options = {
          title : 'Polpulation According to CITY from Abhyasi',
          vAxis: {title: 'Male'},
          hAxis: {title: 'Female'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('demo'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="demo" style="width: 900px; height: 500px;"></div>
  </body>
</html>