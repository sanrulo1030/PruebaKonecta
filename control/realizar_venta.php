<?php
include("../control/controlconexion.php");
$Cantidad = $_POST['Cantidad'];
$IdProducto = $_POST['IdProducto'];

$Cantidad=intval($Cantidad);
$IdProducto=(intval($IdProducto));
$Fecha_venta = date("Y-m-d");



$objControlConexion = new ControlConexion();
$objControlConexion->abrirBd("localhost","root","","konecta");
$comandoSql = "SELECT * FROM producto WHERE ID = '".$IdProducto."'"; 
$rs = $objControlConexion->ejecutarSelect($comandoSql);
$r = $rs->fetch_array(MYSQLI_BOTH);
$Stock= intval($r["Stock"]);
$Total= intval($Cantidad*$r["Precio"]);



if(($Stock-$Cantidad)>=0)
{
    
         $cmdSql="INSERT INTO venta VALUES(NULL,".$IdProducto.",".$Cantidad.",".$Total.",'".$Fecha_venta."')";
         $cmdSql1="UPDATE producto SET Stock='".($Stock-$Cantidad)."' WHERE ID='".$IdProducto."'";
         $objControlConexion->ejecutarComandoSql($cmdSql);
         $objControlConexion->ejecutarComandoSql($cmdSql1);
         $objControlConexion->cerrarBd();
         $valor=true;
         
         
}
else
{
    $valor=false;
           
}
echo json_encode($valor);
?>