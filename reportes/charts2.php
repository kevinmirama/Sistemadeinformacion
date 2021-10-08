<?php include "db.php"; ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Masculino','genero'],
          <?php
          $result=$conn->query("
          select SUM(CASE WHEN id_estado = 1 then 1 else 0 END) as Activas FROM practica");
            while($row=$result->fetch_assoc()){

              echo "['Activas',".$row['Activas']."],";
            }

            $result=$conn->query("
            select SUM(CASE WHEN id_estado = 2 then 1 else 0 END) as Inactivas FROM practica");
              while($row=$result->fetch_assoc()){
  
                echo "['Inactivas',".$row['Inactivas']."],";
              }

          ?>
        ]);

        var options = {
          title: 'Reporte de prácticas activas e inactivas '
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
