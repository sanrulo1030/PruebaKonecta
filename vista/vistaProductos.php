<?php

include '../control/controlconexion.php';




$fechaactual = date("Y-m-d");

/* Consultar ultimo producto */
$db = new controlconexion();
$db->abrirBd("localhost","root","","konecta");
$comandoSql = "SELECT ID FROM producto ORDER BY ID DESC LIMIT 1";
$rs = $db->ejecutarSelect($comandoSql);
//$registros = $rs->fetch_all(MYSQLI_ASSOC);
$r = $rs->fetch_array(MYSQLI_BOTH);
$r1= intval($r["ID"]);

$db->cerrarBd();

$db = new controlconexion();
$db->abrirBd("localhost","root","","konecta");
$comandoSql = "SELECT * FROM producto";
$rs = $db->ejecutarSelect($comandoSql);
$registros = $rs->fetch_all(MYSQLI_ASSOC);


$db->cerrarBd();



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
		<title>Productos</title>
	</head>
	<body>

	<h2 class="sub-title-home">Productos Registrados</h2>
       <div class="table_re">
     <table class ="tabla_empleados">
     <thead>
     <tr>
     <th>ID</th>
     <th>NOMBRE</th>
     <th>REFERENCIA</th>
     <th>PRECIO</th>
     <th>PESO</th>
     <th>CATEGORIA</th>
	 <th>STOCK</th>
	 <th>FECHA CREACIÓN</th>
     <th>Editar</th>
     <th>Eliminar</th>
	 <th>Vender</th>
     </tr>
     </thead>
     <?php foreach($registros as $registro) {?>
     <tr>
      <td><?php echo $registro["ID"];  ?></td>
      <td><?php echo $registro["Nombre"];  ?></td>
      <td><?php echo $registro["Referencia"];  ?></td>
      <td><?php echo $registro["Precio"];  ?></td>
      <td><?php echo $registro["Peso"];  ?></td>
      <td><?php echo $registro["Categoria"];  ?></td>
	  <td><?php echo $registro["Stock"];  ?></td>
	  <td><?php echo $registro["Fecha_creacion"];  ?></td>
	  <span>
	  <?php $variablePHP=$registro["ID"]; ?>
	  </span>
    
      <td><a href="editar-producto.php?ID=<?php echo $registro["ID"];?>"><i class="bi bi-pencil-fill"></i></i></a></td>
      <td><a href="../control/eliminar-producto.php?ID=<?php echo $registro["ID"];?>"><i class="bi bi-trash-fill"></i></i></a></td>
	  <td>
	    <a>
		<input class="btn_empl input" type="number" name="Cantidad" placeholder="Cantidad" id="Cantidad<?php echo $registro["ID"]; ?>" title="Ingrese la Cantidad" autocomplete="off" required >
		<i class="bi bi-bag" onclick="vender(<?php echo $registro['ID'];?>)"></i></i>	
		<input class="btn_empl input" type="number" name="clave" placeholder="clave" id="clave<?php echo $registro["ID"];?>" value="<?php echo $registro["ID"]; ?>" pattern="[0-9]*" title="id autoincrementable" autocomplete="off" hidden>
		
	</a>
		
	  </td>
     
     </tr>
     <?php }?>
     </table>

     
     </div> 
     
     <!-- Inicio insert -->
		<div class="home">
			<div class="card text-white bg-dark">
				<div class="card-header text-center">
						<h2>Datos Productos</h2>
				</div>
				<div class="card-body">
					<form method="post", action="vistaProducto.php" enctype="multipart/form-data">
						<div class="container" align="center">
							<table class="table table-bordered table-dark">
								<tr>
									<td><label for="ID">ID:</label></td>
									<td><input class="btn_empl input" type="number" name="ID" placeholder="ID" id="ID" value="<?php echo $registro["ID"];; ?>" pattern="[0-9]*" title="id autoincrementable" autocomplete="off"></td>
								</tr>
								<tr>
									<td><label for="Nombre">Nombre:</label></td>
									<td><input class="btn_empl input" type="text" name="Nombre" placeholder="Nombre" id="Nombre" title="Ingrese el Nombre" autocomplete="off" required></td>
								</tr>
                                <tr>
                                <td><label for="Referencia">Referencia:</label></td>
							<div>
								    <td> <input class="btn_empl input" type="text" name="Referencia" placeholder="Referencia" id="Referencia" title="Ingrese la Referencia" autocomplete="off" required></td>
							</div><!-- end row -->
                                </tr>
                                <tr>
                                
								<td><label for="Precio">Precio:</label></td>
							<div>   
								<td> <input class="btn_empl input" type="number" name="Precio" placeholder="Precio" id="Precio" title="Ingrese la Precio" autocomplete="off" required></td> 
                                </tr>
							</div> <!-- end row -->
					        <tr>
							 </div><!-- end row -->
							     <td><label for="Peso">Peso:</label></td>
							 <div>
								<td> <input class="btn_empl input" type="number" name="Peso" placeholder="Peso" id="Peso" title="Ingrese el Peso" autocomplete="off"required></td>
							 </div><!-- end row -->
                            </tr>
                            <tr>
                                <td><label for="Categoria">Categoría:</label></td>
							    <div>
							      <td> <input class="btn_empl input" type="text" name="Categoria" placeholder="Categoria" id="Categoria" title="Ingrese la Categoria" autocomplete="off"required></td>
							    </div><!-- end row -->
	                        </tr>
							<tr>
							<td><label for="Stock">Stock:</label></td>
							<div>
								<td> <input class="btn_empl input" type="text" name="Stock" placeholder="Stock" id="Stock" title="Ingrese la cantidad en Stock" autocomplete="off"required></td>
							</div><!-- end row -->
	                        </tr>
							<tr>
							<td><label for="Fecha_creacion">Fecha_creación:</label></td>
							<div>
								<td> <input class="btn_empl input" type="date" name="Fecha_creacion" placeholder="Fecha_creacion" id="Fecha_creacion" title="Ingrese la Fecha de creación" autocomplete="off"required></td>
							</div><!-- end row -->
							</div><!-- end row -->
                            </tr>
							
                            </div>
								
							</table>
						</div>
				</div>
				<div class="card-footer">
				 <div class="container" align="center">
					<table>
						<tr>
							<td>
								<input class="btn btn-outline-success" type="submit" name="btn" value="Guardar">
							</td>
							<td>
								<input class="btn btn-outline-success" type="submit" name="btn" value="Consultar">
							</td>
							<td>
								<input class="btn btn-outline-success" type="submit" name="btn" value="Modificar">
							</td>
							<td>
								<input class="btn btn-outline-success" type="submit" name="btn" value="Borrar">
							</td>
							<td>
								<input class="btn btn-outline-success" type="submit" name="btn" value="Listar">
							</td>					
						</tr>
					</table>
	             </div>
				</div>
			</div>
		</div>
					</form>

				<script>

						function vender(id)
						{

							var Cantidad = document.getElementById("Cantidad"+id).value; // Obtener el valor del campo de entrada
							var IdProducto = document.getElementById("clave"+id).value; // Obtener el valor del campo de entrada
                            //document.getElementById("resultado").textContent = dato; // Asignar el valor al contenido del <span>
                            //console.log(IdProducto)
							//console.log(Cantidad)
                            if ($('#Cantidad'+id).val().length == 0)
							{
                            alert('Ingrese una cantidad valida para la venta. ');
                            return;
                            }

							
                                   $.ajax({
                                    url: '../control/realizar_venta.php', // Ruta al archivo PHP que contiene el método
                                    type: 'POST', // Método HTTP utilizado para la petición
							        dataType: 'json', // Tipo de datos esperado en la respuesta
                                    data: { Cantidad: Cantidad, IdProducto: IdProducto }, // Datos enviados al método en formato de objeto
                                    success: function(response) 
							        {
                                      // Manejar la respuesta del método PHP
							          if (response === true) 
							           {
							       		
                                            alert('Se realizó correctamente la venta.');
                                       }
							       	else
							       	{
                                            alert('No hay suficientes productos en stock.');
                                       }
                                   },
                              error: function(xhr, status, error) 
							       {
                                     // Manejar cualquier error de la petición AJAX
                                      console.log(error);
                                   }
                                     });

					}


                                
    
                </script>
	</body>
</html>