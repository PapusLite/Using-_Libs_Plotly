<?php
require_once "php/conexion.php";

$conexion= conexion();
  
$sql= "SELECT fechaVenta, montoVenta FROM ventas order by fechaVenta";
$result= mysqli_query($conexion,$sql);
$valoresX=array(); //Fechas
$valoresY=array(); //Montos

while($ver= mysqli_fetch_row($result)){
  $valoresX[]=$ver[0];
  $valoresY[]=$ver[1];
}
$datosX=json_encode($valoresX);
$datosY=json_encode($valoresY); 

?>

<div id="graph_bar">
</div>
<script>
  function crearCadenaBarras(json){
    var parsed= JSON.parse(json);
    var arr=[];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>
<script>
   datosX= crearCadenaBarras('<?php echo $datosX ?>' );
   datosY= crearCadenaBarras('<?php echo $datosY ?>' );
</script>

<script>   

    var data = [
  {
    x: datosX,
    y: datosY,
    type: 'bar'
  }
];

Plotly.newPlot('graph_bar', data);
</script>