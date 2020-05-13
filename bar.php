<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graph BAR</title>
</head>
<body>
<?php
require_once "php/conexion.php";

$conexion= conexion();
  
$sql= "SELECT fecha, habana FROM habanacuba order by fecha";
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
    type: 'bar',
    name: 'Casos',
    resize: true,
    marker: {
    color: 'red',
    line: {
      color: 'black',
      width: 2
    }
  }    
  }  
];
var layout = {
  title: 'Ventas Graph_Bar',
  font:{
    family: 'Raleway, sans-serif'
  },
  showlegend: false,
  xaxis: {
    tickangle: -45
  },
  yaxis: {
    title: '$ Costos',
    zeroline: false,
    gridwidth: 2
  },
  bargap :0.1
};

Plotly.newPlot('graph_bar', data, layout);
</script>
</body>
</html>