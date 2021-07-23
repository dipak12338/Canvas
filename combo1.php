<?php
  
$datapts1 = array();

try{
     
    $link = new \PDO('mysql:host=localhost;dbname=londry_db;charset=utf8mb4', 
                        'root', 
                        '', 
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare("select distinct state,COUNT(state) as num from
	(
    select state from trainer
    union all
    select state from abhyasi 
	) t GROUP by state"); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($datapts1, array("label"=> $row->state, "y"=> $row->num));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>

<?php
$dataPoints2 = array();
try{
    $link = new \PDO('mysql:host=localhost;dbname=londry_db;charset=utf8mb4', 'root', '', 
          array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare("SELECT 
COUNT(CASE WHEN gender='Male' THEN 1  END) As Male,
COUNT(CASE WHEN gender='Female' THEN 1  END) As Female,
COUNT(*) as Total
FROM
(
select * from trainer
    union ALL
SELECT * from abhyasi
)t"); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
	    foreach($result as $row){        
        array_push($dataPoints2, array("label"=> "Male", "y"=>  $row->Male));}


        foreach($result as $row){        
        array_push($dataPoints2, array("label"=> "Female", "y"=>  $row->Female));}





	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
?>


<?php
$dataPoints3 = array();
try{
    $link = new \PDO('mysql:host=localhost;dbname=londry_db;charset=utf8mb4', 'root', '', 
          array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare("select state,count(*) as num from trainer"); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
	    foreach($result as $row){        
        array_push($dataPoints3, array("label"=> "Trainer", "y"=>  $row->num));}
	$handle = $link->prepare("select state,count(*) as num from abhyasi"); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        foreach($result as $row){        
        array_push($dataPoints3, array("label"=> "Abhyasi", "y"=>  $row->num));}





	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
?>



<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Statewise Population"
	},
	axisY: {
		title: "Number of People"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($datapts1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "Population According to Cities"
	},
	subtitles: [{
		text: "Year 2021"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
 



 
var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	title: {
		text: "Population According to Cities"
	},
	subtitles: [{
		text: "Year 2021"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
</head>
<body>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 45%;display:inline-block;"></div>
<div id="chartContainer3" style="height: 370px; width: 45%;display:inline-block;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</body>
</html> 













