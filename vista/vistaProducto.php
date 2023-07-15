<?php
include("../control/controlconexion.php");
include("../control/ControlProductos.php");
include("../modelo/Producto.php");
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">';

	$ID=$_POST['ID'];
	$Nombre=$_POST['Nombre'];
    $Referencia=$_POST['Referencia'];
    $Precio=$_POST['Precio'];
    $Peso=$_POST['Peso'];
	$Categoria=$_POST['Categoria'];
	$Stock=$_POST['Stock'];
	$Fecha_creacion=$_POST['Fecha_creacion'];

/* echo $SKU.'<br>';
echo $nombre.'<br>';
echo $descripcion.'<br>';
echo $FKtienda.'<br>';
echo $valor.'<br>';
var_dump($imagen);
exit; */


	$bot=$_POST['btn'];

switch ($bot) {
	case 'Guardar':
		$objProductos= new Producto(NULL, $Nombre, $Referencia, $Precio, $Peso, $Categoria, $Stock, $Fecha_creacion);
		$objControlProductos= new ControlProductos($objProductos);
		$objControlProductos->guardar();
		if($objControlProductos){
			?>
		<script type="text/javascript">
            var agree = confirm('Agregado con èxito, desea registrar otro Producto?');
                if (agree)
				{
			    parent.location.href=('../vista/vistaProductos.php');
				$('#loading').hide();
				$('.content-page').show();
			    }else
				{ 
					var agree = confirm('Desea consultar otro producto?.');
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
						 }}
		
		</script>
<?php
}
?>
<?php
		echo "Guardado correctamente";
		break;
	case 'Consultar':
		$objProductos= new Producto($ID,"","",0,0,"","","");
		$objControlProductos= new ControlProductos($objProductos);
		$resultado = $objControlProductos->consultar();
			if ($resultado->num_rows > 0) {
				echo "<table class='table table-bordered table-dark'><tr><th>SKU</th><th>NOMBRE</th><th>DESCRIPCION</th><th>FK TIENDA</th><th>VALOR</th><th>IMAGEN</th></tr>";
				while($fila = $resultado->fetch_assoc()) {
				  echo "<tr><td>".$fila["ID"]."</td><td>".$fila["Nombre"]."</td><td>".$fila["Referencia"]."</td><td>".$fila["Precio"]."</td><td>".$fila["Peso"]."</td><td>".$fila["Categoria"]."</td><td>".$fila["Stock"]."</td><td>".$fila["Fecha_creacion"]."</td></tr>";
				}
				echo "</table>";
			  } else {
				echo "No se encontraron resultados";
			  }			 
			break;
	case 'Modificar':
		$objProductos= new Producto($ID, $Nombre, $Referencia,$Precio,$Peso, $Categoria, $Stock, $Fecha_creacion);
		$objControlProductos= new ControlProductos($objProductos);
		$objControlProductos->modificar();
		if($objControlProductos){
			?>
		<script type="text/javascript">
            var agree = confirm('Modificado con èxito, desea registrar otro Producto?.');
                if (agree)
				{
			    parent.location.href=('../vista/vistaProductos.php');
				$('#loading').hide();
				$('.content-page').show();
			    }else
				{ 
					var agree = confirm('Desea consultar otro producto?.');
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
						 }}
		
		</script>
<?php
}
?>
<?php
		break;
	case 'Borrar':
		$objProductos= new Producto($ID,"","",0,0,"","","");
		$objControlProductos= new ControlProductos($objProductos);
		$objControlProductos->borrar();
		echo "Borrado correctamente";
		if($objControlProductos){
			?>
		<script type="text/javascript">
            var agree = confirm('Eliminado con èxito, desea  eliminar o registrar otro producto?.');
                if (agree)
				{
			    parent.location.href=('../vista/vistaProductos.php');
				$('#loading').hide();
				$('.content-page').show();
			    }else
				{ 
					var agree = confirm('Desea consultar otro producto?.');
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
						 }}
		
		</script>
<?php
}
?>
<?php
		break;
	case 'Listar':
		$objProductos= new Producto($ID,"","",0,0,"","","");
		$objControlProductos= new ControlProductos($objProductos);
		$resultado = $objControlProductos->Listar();
			if ($resultado->num_rows > 0) {
				echo "<table class='table table-bordered table-dark'><tr><th>SKU</th><th>NOMBRE</th><th>DESCRIPCION</th><th>FK TIENDA</th><th>VALOR</th><th>IMAGEN</th></tr>";
				while($fila = $resultado->fetch_assoc()) {
					echo "<tr><td>".$fila["ID"]."</td><td>".$fila["Nombre"]."</td><td>".$fila["Referencia"]."</td><td>".$fila["Precio"]."</td><td>".$fila["Peso"]."</td><td>".$fila["Categoria"]."</td><td>".$fila["Stock"]."</td><td>".$fila["Fecha_creacion"]."</td></tr>";
				}
				echo "</table>";
			  } else {
				echo "No se encontraron resultados";
			  }			 
			break;
	default:
		$resultado ="otro";
		break;
}

?>