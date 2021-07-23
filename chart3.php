 <?php

  $con= mysqli_connect("localhost","root","","dash_maps");
  echo "ok";
//$rt1 = mysqli_query($con,"SELECT dist,count(gen) as number FROM people where gen='male' group by dist");



$rt = mysqli_query($con,"SELECT dist,
COUNT(CASE WHEN gen='Male' THEN 1  END) As Male,
COUNT(CASE WHEN gen='Female' THEN 1  END) As Female,
COUNT(*) as Total
FROM people GROUP BY dist");




while ($row = mysqli_fetch_array($rt)) { 

     echo "['".$row["dist"]."',".$row["Male"]."," . $row["Female"] ."]";  
}

 ?>

  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff()
       {
        var data = new google.visualization.arrayToDataTable([
          ['CITIES', 'Male', 'Female'], 


          <?php

                $rt = mysqli_query($con,"SELECT dist,
                COUNT(CASE WHEN gen='Male' THEN 1  END) As Male,
                COUNT(CASE WHEN gen='Female' THEN 1  END) As Female
                FROM people GROUP BY dist");

            while ($row = mysqli_fetch_array($rt)) { 

                 echo "['".$row["dist"]."',".$row["Male"]."," . $row["Female"] ."],";  
            }
            ?>
          ]); 

        var options = {  width: 600, chart: {title: 'TITLE',subtitle: 'Sub Title'},
          bars: 'vertical',
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'
          },

          axes: {
            x: {
              ssssssss: {label: 'parsecs'}, // Bottom x-axis.
              ffffffffffff: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };


      var chart = new google.charts.Bar(document.getElementById('demo'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="demo" style="width: 900px; height: 500px;">Here this is</div>
  </body>
</html>







<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expense'],
          



<?php

                $rt = mysqli_query($con,"SELECT dist,
                COUNT(CASE WHEN gen='Male' THEN 1  END) As Male,
                COUNT(CASE WHEN gen='Female' THEN 1  END) As Female
                FROM people GROUP BY dist");

            while ($row = mysqli_fetch_array($rt)) { 

                 echo "['".$row["dist"]."',".$row["Male"]."," . $row["Female"] ."],";  
            }
            ?>
        ]);


        var options = {  width: 600, chart: {title: 'TITLE',subtitle: 'Sub Title'},
          bars: 'vertical',
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'
          },

          axes: {
            x: {
              ssssssss: {label: 'parsecs'}, // Bottom x-axis.
              ffffffffffff: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        }


        var options = {width: 600,
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
