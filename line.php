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
  // line-and-scatter-plot  
  line: {
      color: 'red',
      width: 2
    },
  marker: {
    color: 'blue',
    size: 9, 
  },
  type: 'scatter'
}; 
 // styling-line-plot
var layout = {
  title: 'Ventas',
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
