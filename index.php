<!DOCTYPE html>
<html lang="es ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph Plotly</title>
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
    <script src="libs/jquery-3.5.1.min.js"></script>
    <script src="libs/plotly-latest.min.js"></script>
</head>
<body>
    <!-- Extructura -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">         
                </div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="loadline"></div>
                        </div>
                        <div class="col-sm-6">
                            <div id="loadbar"></div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    
</body>
</html>
<script>
        $(document).ready(function(){
        $('#loadline').load('line.php');
        $('#loadbar').load('bar.php');
    });
</script>
   