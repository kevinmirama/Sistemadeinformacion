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
          select SUM(CASE WHEN id_genero = 1 then 1 else 0 END) as Masculino FROM usuarios");
            while($row=$result->fetch_assoc()){

              echo "['Masculino',".$row['Masculino']."],";
            }

            $result2=$conn->query("
          select SUM(CASE WHEN id_genero = 2 then 1 else 0 END) as Femenino FROM usuarios");
            while($row2=$result2->fetch_assoc()){

              echo "['Femenino',".$row2['Femenino']."],";
            }

          ?>
        ]);

        var options = {
          title: 'Reporte general de usuarios  por genero (tabla usuarios)'
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
