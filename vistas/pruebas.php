 <!--CODIGO 1 -->

<select id="select_planta_input" class="form-control " name="select_planta_input">
    <option value="0">Seleccionar</option>
    <?php 
    include "./conexion.php";
    $query_planta = mysqli_query($conn,"SELECT planta FROM datos ");
    $result_planta = mysqli_num_rows($query_planta);
            while ($planta = mysqli_fetch_array($query_planta)) {
                echo '<option value="'.$planta[id].'">'.$planta[datos].'</option>';  
            }
     ?>
</select> -->



<!-- CODIGO  2  -->


<div class="container">
<h3 class="mt-5"><a href="https://www.baulphp.com/llenar-select-html-con-mysql-php-ejemplos/" target="_blank">Llenar select HTML con MySQL PHP</a></h3>
<hr>
<div class="row">
<div class="col-12 col-md-12"> 


<?php
$usuario = 'root';
$password = '';
$db = new PDO('mysql:host=localhost;dbname=php_llenarselect', $usuario, $password);
?>
<div align="left">
<p>Seleccione un pais del siguiente menú:</p>
<form class="form-inline">
<div class="form-group mb-2">
<label for="staticEmail2">Paises:</label>
</div>
<div class="form-group mx-sm-3 mb-2">
<label for="paises" class="sr-only">Paises:</label>
<select class="form-control" >
<option value="">Seleccione:</option>
<?php
$query = $db->prepare("SELECT * FROM paises");
$query->execute();
$data = $query->fetchAll();

foreach ($data as $valores):
echo '<option value="'.$valores["id"].'">'.$valores["paises"].'</option>';
endforeach;
?> 






