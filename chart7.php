<?php
  $con= mysqli_connect("localhost","root","","dash_maps");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      
      google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawSarahChart);
      
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
                      <?php
     $rt = mysqli_query($con,"SELECT dist,count(*) as number FROM people  group by dist");
     while ($row = mysqli_fetch_array($rt)) 
                            {
                              echo "['".$row["dist"]."',".$row["number"]."],";
                              }
                       ?>

    ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Population data acording to district',
                       width:600,
                       height:600};

        var chart = new google.visualization.PieChart(document.getElementById('demo'));
        chart.draw(data, options);
      }

      

                    
      
    </script>
  </head>
  <body>
    <div id="demo" style="border: 1px solid #ccc"></div><
  
  </body>
</html>





