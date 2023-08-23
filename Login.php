<!DOCTYPE html>
<html>
<head>
<title>Login de Usuario</title>
</head>
<style>
body {font-family:Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;padding: 16px;}
</style>
<body>
<form action="Login.php" method="POST">
<h3>Login de Usuarios</h3>
<label for="txt1">Usuario:</label>
<input type="" name="t1" required>
<br>
<br>
<label form="txt1">Password</label>
<input type="" name="t2" required>
<br>
<input type="submit" name="" value="Ingresar">
</form>
</body>
<?php
if($_POST){
    session_start();
    require('conexion.php');
    $u=$_POST['t1'];
    $p=$_POST['t2'];
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query=$conexion->prepare("SELECT * FROM usuarios WHERE nombre=:u AND pass=:p");
    $query->bindParam(":u",$u);
    $query->bindParam(":p",$p);
    $query->execute();
    $usuarios=$query->fetch(PDO::FETCH_ASSOC);
    if($usuarios){
        $_SESSION["usuario"]= $usuarios["nombre"];
        //header("location:Pagina_segura.php");
    }else{
        echo "Usuario o password invalidos";
    }
}
?>
</html>
