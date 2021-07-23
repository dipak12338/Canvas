 <?php

  $con= mysqli_connect("localhost","root","","dash_maps");
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['City', 'Males', 'Females'],
          



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


        


        var options = {width: 600,
          chart: {
            title: 'Total Males and Females',
            subtitle: 'From Number of cities',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>

    <select name="dis">
        <option value="">Nagpur</option>
        <option value="">Gondia</option>
        <option value="">Bhandara</option>
    </select>

    <input type="submit" name="submit" value="Submit">






    <div id="barchart_material" style="width: 900px; height: 500px;"></div>



  </body>
</html>
