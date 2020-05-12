<?php
require_once "php/conexion.php"
?>

<div id="graph_bar">
</div>

<script>
    var data = [
  {
    x: ['giraffes', 'orangutans', 'monkeys'],
    y: [20, 14, 23],
    type: 'bar'
  }
];

Plotly.newPlot('graph_bar', data);
</script>