<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graph LINE</title>
</head>
<body>
<?php
require_once "php/conexion.php";
$conexion= conexion();
  
$sql= "SELECT fecha, cuba FROM habanacuba order by fecha";
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

<div id="graph_line">
</div>

<script>
  function crearCadenaLineal(json){
    var parsed= JSON.parse(json);
    var arr=[];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>
 <script>
   datosX= crearCadenaLineal('<?php echo $datosX ?>' );
   datosY= crearCadenaLineal('<?php echo $datosY ?>' );
 </script>

<script>

 
  var trace1 = {
    x: datosX,
    y: datosY,
  mode: 'lines+markers',
  resize: true,
    // line-and-scatter-plot 
     
  line: {
      color: 'red',
      width: 2
    },
  marker: {
    color: 'blue',
    size: 9, 
  },
  name: 'Casos',
  type: 'scatter'
}; 
 // styling-line-plot
var layout = {
  
  title: 'Ventas Graph_Line',
  xaxis: {
    title: 'Fechas'
  },
  yaxis: {
    title: '$ Costos'
  }
};

var data = [trace1];
Plotly.newPlot('graph_line', data, layout);
</script>
</body>
</html>
