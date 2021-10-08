<?php include "db.php"; ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['id_estado','nombre_practica'],
          <?php
    
              $result=$conn->query("
              select SUM(CASE WHEN id_estado = 1 then 1 else 0 END) as activas FROM practica WHERE fecha_inicio BETWEEN fecha_inicio AND fecha_fin");
              while($row=$result->fetch_assoc()){
  
                echo "['activas',".$row['activas']."],";
              }

              $result=$conn->query("
              select SUM(CASE WHEN id_estado = 2 then 1 else 0 END) as inactivas FROM practica WHERE fecha_inicio BETWEEN fecha_inicio AND fecha_fin");
              while($row=$result->fetch_assoc()){
  
                echo "['inactivas',".$row['inactivas']."],";
              }

          ?>
        ]);

        var options = {
          title: 'Reporte de practicas activas e inactivas (coordinador)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
