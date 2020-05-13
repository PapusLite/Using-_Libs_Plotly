<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graph LINE1</title>
</head>
<body>
<?php
require_once "php/conexion.php";
$conexion= conexion();
  
$sql1= "SELECT fecha, cuba, habana FROM habanacuba order by fecha";
$result= mysqli_query($conexion,$sql1);
$valoresX=array(); //Fechas
$valoresY0=array(); //Montos
$valoresY1=array(); //Casos

while($ver= mysqli_fetch_row($result)){
  $valoresX[]=$ver[0];
  $valoresY0[]=$ver[1];
  $valoresY1[]=$ver[2];
}

$datosX=json_encode($valoresX);
$datosY0=json_encode($valoresY0); 
$datosY1=json_encode($valoresY1); 

?>

<div id="graph_line1">
</div>

<script>
  function crearCadenaLineal1(json){
    var parsed= JSON.parse(json);
    var arr=[];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>
 <script>
   datosX= crearCadenaLineal1('<?php echo $datosX ?>' );
   datosY0= crearCadenaLineal1('<?php echo $datosY0 ?>' );
   datosY1= crearCadenaLineal1('<?php echo $datosY1 ?>' );
  </script>

<script>
  
var trace2 = {
  x: datosX,
  y: datosY1,
  mode: 'lines',
  name: 'Cuba',
  
};

var trace3 = {
  x: datosX,
  y: datosY0,
  mode: 'lines+markers',
  name: 'Habana',
  
};

var data = [trace2, trace3];

var layout = {
  title: 'Casos diario Cuba vs Habana',
  xaxis: {
    title: 'Fecha'
  },
  yaxis: {
    title: 'Casos dia_dia'
  }
};

Plotly.newPlot('graph_line1', data, layout);   
 
</script>
</body>
</html>
