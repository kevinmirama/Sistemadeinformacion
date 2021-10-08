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
          $result3=$conn->query("
          select SUM(CASE WHEN id_estado = 1 then 1 else 0 END) as Activos FROM usuarios WHERE id_rol=2");
            while($row3=$result3->fetch_assoc()){

              echo "['Activos',".$row3['Activos']."],";
            }

            $result4=$conn->query("
            select SUM(CASE WHEN id_estado = 2 then 1 else 0 END) as Inactivos FROM usuarios WHERE id_rol=2");
              while($row4=$result4->fetch_assoc()){
  
                echo "['Inactivos',".$row4['Inactivos']."],";
              }

              
          ?>
        ]);

        var options = {
          title: 'Reporte general de coordinadores '
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