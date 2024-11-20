<?php
   include("configBD.php");

    $consulta = "SELECT * FROM instituicoes";
    $listaInstituicao = mysqli_query($conexao,$consulta);
    return $listaInstituicao; 
?>
