<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Diplomas De los alumnos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-icons.css">
</head>
<body>
<?php include 'conexionPDO.php'; ?>
<?php $consultaA =$base->query("SELECT * FROM alumnos ")->fetchAll(PDO:: FETCH_OBJ); ?>	
	    <body class="bg-dark">
        <div class="py-3"></div>
        <div class="container py-5 bg-white">
            <div class="row text-center">
                <div class="col-md-12">
                    <i style="font-size: 100px;"  class="icon-file text-warning"></i>
                    <h1>Generador De Diplomas Con PHP</h1>
                     <h4 class="text-warning bg-light">Pulsa el boton amarillo para generar el diploma del alumno. </h4>
                </div>
                <div class="col-md-12">

                    <div class="py-3"></div>
                    <table id="tabla" class=" table table-striped table-bordered  table-condensed">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>fecha</th>
                    <th>Generar diploma</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($consultaA as $key): ?>
            		
                <tr>
                    <td><?php echo $key->id; ?></td>
                    <td><?php echo $key->nombre. ' '.$key->apellido; ?></td>
                    <td><?php echo $key->fecha; ?></td>
                    <td><a class="btn btn-warning" href="generador_diploma.php?id=<?php echo $key->id; ?>">Descargar <i class="icon-upload"></i></a></td>
                </tr>
            	<?php endforeach ?>

            </tbody>
        </table>
                    
                </div>
                
                
            </div>
        </div>
        
        <div class="py-3"></div>
        <div class="footer jumbotron text-dark py-5 mb-4">

            <div class="container">

                <div class="row text-center">
                    <div class="col-md-12">
                        Todos los derechos reservados |
                        <a href="https://github/barry503"> barry503</a>
                    </div>
                </div>
            </div>
        </div>
        
        

</body>
</html>