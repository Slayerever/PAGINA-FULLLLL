<?php
$servidor="localhost";
$usuario="root";
$clave="";
$bddatos="sprits";
$conexion=mysqli_connect($servidor,$usuario,$clave,$bddatos) or die("CONEXION FALLIDA");


//INSERTAR DATOS
if(isset($_POST["registrar"])){
    $Nombre= $_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $Email=$_POST['Email'];
    $Usuario=$_POST['Usuario'];
    $Password=$_POST['Password'];
    
   
    $insertar="insert into registrarse values(' ',' ".$Nombre." ',' ".$Apellido." ',' ".$Email." ',' ".$Usuario." ',' ".$Password." ')";
    $resultado= mysqli_query($conexion,$insertar) or die("ERROR AL INSERTAR REGISTROS");
    echo"<script>location.href=index.html'</script>";
    mysqli_close($conexion);
        echo"<script>alert('DATOS INSERTADOS CORRECTAMENTE')</script>";
        echo"<script>location.href=index.html'</script>";
    }
    
   /*
   if(isset($_POST["LOGINEAR"])){
    $usuario=$_POST['usuario'];
    $contrasenia=$_POST['contrasenia'];
    $sentencia=$conexion ->prepare("SELECT * FROM registrarse WHERE usuario=? AND contrasenia=? ");
    $sentencia->bind_param('ss' ,$usuario,$contrasenia);
    $sentencia->execute();
    $resultado = $sentencia ->get_result(); 
    if ($fila = $resultado->fetch_assoc()) {
        header("location:index.php");
       
        
    }else{
        echo "<script>alert('usuario o contraseña incorrecta')</script>";
        echo "<script>location.href='login.php' </script> ";
    }
    
   $sentencia->close();
   $conexion->close();
    }  
    */
    
    if(isset($_POST["LOGINEAR"])){
     $usuario=$_POST['usuario'];
     $contrasenia=$_POST['contrasenia'];
$sentencia=$conexion->prepare("SELECT * FROM registrarse WHERE usuario=? AND contrasenia=?");
$sentencia->bind_param('ss',$usuario,$contrasenia);
$sentencia->execute();
$resultado = $sentencia->get_result();
if($fila === $resultado->fetch_assoc()) {
         header("location:index.html");     
}else{
     echo"<script>alert('USUARIO O CONTRASEÑA INCORRECTA')</script>";
        echo"<script>location.href='login.html'</script>";
}
$sentencia->close();
$conexion->close();
  }
    


 if(isset($_POST["recup"])){
    $Email=$_POST['Email'];
    
    $sentencia=$conexion -> prepare("SELECT * FROM registrarse WHERE Email=? ");
    $sentencia->bind_param('ss',$Email);
    $sentencia->execute();
    $resultado = $sentencia ->get_result(); 
    if ($fila = $resultado->fetch_assoc()) {
        header("location:index.html");
        echo "<script>alert('email para reset de contrasenia enviado')</script>";
       
    }else{
        echo "<script>alert('email incorrecto')</script>";
        echo "<script>location.href='index.html' </script> ";
    }
    
   $sentencia->close();
   $conexion->close();
    }  
    
    
?>


