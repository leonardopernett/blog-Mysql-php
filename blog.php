<?php 
  
  $conexion = mysqli_connect('localhost', 'root', 'Admin09','notiweb');

  if(!$conexion){
     echo "la conexion ha fallado". mysqli_error();
     exit();
  }
    
    $sql="SELECT * FROM contenido ORDER BY fecha DESC";

    $resultado = mysqli_query($conexion, $sql)

        
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
  
<div class="container mt-5">
   <div class="row">
     <div class="col-md-9  mx-auto">
          <div class="card">
            <div class="card-header text-white bg-dark">
            comentarios
            </div>

            <div class="card-body">
               
            <?php  while($row = mysqli_fetch_assoc($resultado)): ?>
            
          
                <img src="images/<?php echo $row['imagen']?>" alt="" class="img-fluid" width="100px" height="100px"><br>
                   
                   <h4> <?php echo $row['titulo']  ?>  </h4> <span class="badge badge-secondary float-right"><?php echo $row['fecha']  ?></span>
                        <p><?php echo $row['comentario']  ?></p> 
                        <hr>
               
                
            <?php   endwhile ?>
               
            </div>
          </div>
     </div>
   </div>
</div>

   


</body>
</html>