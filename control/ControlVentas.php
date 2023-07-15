<?php
include("../control/controlconexion.php");
include("../modelo/Producto.php");
include("../modelo/Venta.php");
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">';

	
    
    $FKIdProducto = $_POST['FKIdProducto'];
    $Cantidad=$_POST['Cantidad'];
    $Cantidad=intval($Cantidad);
    $Precio=$_POST['Precio'];
    $Precio=doubleval($Precio);
	$Stock=$_POST['Stock'];
    $Stock=intval($Stock);
	$Fecha_venta=$_POST['Fecha_venta'];
    $Total = $Cantidad * $Precio;

    if(($Stock-$Cantidad)>=0)
   {
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","konecta");
            $cmdSql="INSERT INTO venta VALUES(NULL,'".$FKIdProducto."',".$Cantidad.",".$Total.",'".$Fecha_venta."')";
            $cmdSql1="UPDATE producto SET Stock='".($Stock-$Cantidad)."' WHERE ID='".$FKIdProducto."'";
            $objControlConexion->ejecutarComandoSql($cmdSql);
            $objControlConexion->ejecutarComandoSql($cmdSql1);
            $objControlConexion->cerrarBd();

    ?>
    <script type="text/javascript">
    var agree = confirm('Venta realizada, Desea realizar otra compra?.');
                      if (agree) 
                         {
							parent.location.href=('../vista/vistaProductos.php');
							$('#loading').hide();
							$('.content-page').show();
						 }else
						 {
								parent.location.href=('../index.html');
									$('#loading').hide();
									$('.content-page').show();
						 }
    </script>


<?php	
   }else
   {
    ?>
    <script type="text/javascript">
    var agree = confirm('No hay productos suficientes, Desea consultar otro producto o agregar al stock?.');
                      if (agree) 
                         {
							parent.location.href=('../vista/vistaProductos.php');
							$('#loading').hide();
							$('.content-page').show();
						 }else
						 {
								parent.location.href=('../index.html');
									$('#loading').hide();
									$('.content-page').show();
						 }
    </script>
<?php
   }     
    // se llama la función

    
    
?>

