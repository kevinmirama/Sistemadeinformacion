<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['nombre_practica','nombre_practica'],
          <?php
    
              $result=$conn->query("
              SELECT practica.nombre_practica as nombre ,COUNT(usuariospractica.id_practica)as total FROM `usuariospractica` INNER JOIN practica on practica.id_practica = usuariospractica.id_practica GROUP BY nombre");
              while($row=$result->fetch_assoc()){
  		
                echo "['".$row['nombre']."',".$row['total']."],";

              }

          ?>
        ]);

        var options = {
          title: 'Reporte de estudiantes matriculados por practica'
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