<?php
if(! isset($_POST["numero"])){
    header("Location: proveedores");
    exit();
}
include("conexiondb.php");
$sql="insert into telefonos (numero, idproveedores) 
values (:numero, :idproveedores)";
$stm=$conexion->prepare($sql);
$stm->bindParam("numero", $_POST["numero"]);
$stm->bindParam("idproveedores", $_POST["idproveedores"]);
$stm->execute();
header("Location: proveedores?id=".$_POST["proveedor_id"]);
?>