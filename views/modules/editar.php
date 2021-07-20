<?php
if(isset($_SESSION)){
    if(!$_SESSION["usuarioActivo"]){
        header("location:index.php?action=ingresar_error");
    }
}else{
    header("location:index.php?action=ingresar_error");
    exit();
}
?>




<form method="post" action="">


    <?php
    $editar = new MvcController();
    $editar-> editarUsuarioController();
    $editar->actualizarUsuarioController();



    ?>
</form>

<div for="mensaje_error">
</div>



