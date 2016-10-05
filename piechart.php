<?php
    

include "libchart/classes/libchart.php";

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA'"))
    {
  if ($result->num_rows != 0) {

    $countintra = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible'"))
    {
  if ($result->num_rows != 0) {

    $countnone = $mysqli->affected_rows;
    
}
}

    $chart = new PieChart();

    $dataSet = new XYDataSet();
    $dataSet->addPoint(new Point("INTRA Student {$countintra}", $countintra));
    $dataSet->addPoint(new Point("Pending Student {$countnone}", $countnone));
    $chart->setDataSet($dataSet);

    $chart->setTitle("INTRA Student Pie Chart");
    $chart->render("generated/demo3.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Libchart pie chart demonstration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
    <img alt="Pie chart"  src="generated/demo3.png" style="border: 1px solid gray;"/>
</body>
</html>