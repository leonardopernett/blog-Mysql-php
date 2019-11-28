<?php 

 $conexion = mysqli_connect('localhost', 'root', 'Admin09','notiweb');

 if(!$conexion){
    echo "la conexion ha fallado". mysqli_error();
    exit();
 }

   //condicionar el erro 
 if($_FILES['imagen']['error']) {

   switch($_FILES['imagen']['error']){
      case 1:  echo " el tamaño excede al tamaño permitido al servidor  ";
      break;

      case 2:  echo " el tamaño excede al tamaño permitido en el formulario ";
        break;
 }

 }else {
     if(isset($_FILES['imagen']['error'])){
       $imagen = $_FILES['imagen']['name'];
       $destino_ruta = "images/";
       move_uploaded_file($_FILES['imagen']['tmp_name'],$destino_ruta. $imagen);
       echo "el archivo ".$imagen. " se ha compiado al directorio";
     }else {

        echo "error no se ha podido cargar";
     }
 }
   
 $titulo = $_POST['campo_titulo'];
 $comentario =$_POST['area_comentarios'];
 $fecha = date("Y-m-d h:i:s");
 $imagen = $_FILES['imagen']['name'];

$sql = "INSERT INTO contenido (titulo , fecha , comentario, imagen ) VALUES ('$titulo','$fecha','$comentario','$imagen') ";
    

$resultado = mysqli_query($conexion, $sql);

 mysqli_close($conexion);

 echo "<br/ > se ha agregado el comentario con exito <br />";

?>