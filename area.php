<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graph AREA</title>
</head>
<body>
<?php
require_once "php/conexion.php";
$conexion= conexion();
  
$sql2= "SELECT fecha, total, pos_act, curados, fallecidos FROM acumulados order by fecha";
$result= mysqli_query($conexion,$sql2);
$valoresX0=array(); //Fechas
$valoresY0=array(); //total
$valoresY1=array(); //pos_activos
$valoresY2=array(); //curados
$valoresY3=array(); //muertes

while($ver= mysqli_fetch_row($result)){
  $valoresX0[]=$ver[0];
  $valoresY0[]=$ver[1];
  $valoresY1[]=$ver[2];
  $valoresY2[]=$ver[3];
  $valoresY3[]=$ver[4];
}
$datosX0=json_encode($valoresX0);
$datosY0=json_encode($valoresY0); 
$datosY1=json_encode($valoresY1); 
$datosY2=json_encode($valoresY2); 
$datosY3=json_encode($valoresY3); 

?>

<div id="graph_area">
</div>
<script>
  function crearCadenaArea(json){
    var parsed= JSON.parse(json);
    var arr=[];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>
<script>
   datosX0= crearCadenaArea('<?php echo $datosX0 ?>' );
   datosY0= crearCadenaArea('<?php echo $datosY0 ?>' );
   datosY1= crearCadenaArea('<?php echo $datosY1 ?>' );
   datosY2= crearCadenaArea('<?php echo $datosY2 ?>' );
   datosY3= crearCadenaArea('<?php echo $datosY3 ?>' );
</script>

<script>   
 var total = {
   x: datosX0,
   y: datosY0,
   fill: 'tozeroy',
   type: 'scatter',
   name:'Total', 
   //fillcolor: 'black',
   line: {
     color: 'violet'     
     //color: '#ab63fa'
   },
  text: "Total",   
 };

 var pos_act = {
   x: datosX0,
   y: datosY1,
   fill: 'tonexty',
   type: 'scatter',
   name:'POS_act', 
   //fillcolor: 'red',
   //fillcolor: '#ab63fa',  
   line: {
      color: 'red'     
     //color: '#ab63fa'
   },
  text: "POS_act",   
 };

 var curados = {
   x: datosX0,
   y: datosY2,
   fill: 'tonexty',
   type: 'scatter',
   name:'Curados', 
   //fillcolor: 'green',
  // fillcolor: '#ab63fa',
  
   line: {
     color: 'yellow'     
     //color: '#ab63fa'
   },
  text: "Curados",
   
 };
var fallecidos = {
  x: datosX0,
  y: datosY3,
  // fill modo de la linea
  fill: 'tozeroy',
  //fill: 'tonexty',
  type: 'scatter',
  name:'Fallecidos',   
  //fillcolor: color: del Area.
  //fillcolor: 'black',
  // fillcolor: '#ab63fa',
  //hoveron: 'no',
   line: {
     //color de la lines
     color: 'black'     
     //color: '#ab63fa'
   },
  text: "Muertos",
 // muestra splp el text:  hoverinfo: 'text'
};

var layout = {
  title: 'Graph Area',
  //showlegend: false,

};

//var data = [fallecidos];
var data = [total, pos_act, curados, fallecidos];

Plotly.newPlot('graph_area', data, layout);

</script>
</body>
</html>