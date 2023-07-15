<?php

include '../control/controlconexion.php';


$ID = $_GET['ID'];
$hoy = getdate();
$fechaActual = date("Y-m-d");




              $db = new controlconexion();
                                                $db->abrirBd("localhost","root","","konecta");
                                                $comandoSql = "SELECT * FROM producto WHERE ID = '".$ID."'";
                                                $rs = $db->ejecutarSelect($comandoSql);
                                                $registros = $rs->fetch_all(MYSQLI_ASSOC);
                                                $db->cerrarBd();
                                                foreach($registros as $registro1) {
                                                      $ID = $registro1['ID'];
                                                      $ID = intval($ID);
                                                      $Nombre = $registro1['Nombre'];
                                                      $Referencia = $registro1['Referencia'];
                                                      $Precio = $registro1['Precio'];
                                                      $Peso = $registro1['Peso'];
                                                      $Categoria = $registro1['Categoria'];
                                                      $Stock = $registro1['Stock'];
                                                      $Fecha_creacion = $registro1['Fecha_creacion'];

                                                  
                                              


                                                                             
                                                                }
                                                                
                                                                

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tienda</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>
    
</head>
<body class="body">
     <h1 class="title-home">Compra de Productos Registrados</h1>
     
     

    <h2 class="sub-title-home">Comprar Producto</h2>
      <div class="home">
          <form class="hijo"  method="post"  action="../control/ControlVentas.php" enctype="multipart/form-data">

          <label style="color:bisque" for="Cantidad_venta">Cantidad Venta:</label>
            <div><td> <input class="btn_empl input" type="number" id="Cantidad" name="Cantidad" placeholder="Cantidad" required="required" autocomplete="off"> </td>
            </div>

            <label style="color:bisque" for="FKIdProducto">IdProducto:</label>
            <div><td> <input class="btn_empl input" type="number" id="FKIdProducto" name="FKIdProducto" placeholder="FKIdProducto" required="required" autocomplete="off" readonly value="<?php echo $ID; ?>"> </td>
            </div>


            <label style="color:bisque" for="Nombre">Nombre:</label>
              <div>
                <td><input class="btn_empl input" type="text" name="Nombre" required placeholder="Nombre" id="Nombre" title="Ingrese el Nombre completo del producto" autocomplete="off" value="<?php echo $Nombre; ?>"></td>
              </div>

           <label style="color:bisque" for="Referencia">Referencia:</label>
              <div>
                 <td> <input class="btn_empl input" type="text" name="Referencia" required placeholder="Referencia" id="Referencia" title="Ingrese la Referencia del producto" autocomplete="off" value="<?php echo $Referencia; ?>"></td>
              </div>
         
                                
           <label style="color:bisque" for="Precio">Precio c/u:</label>
           <div>
             <td> <input class="btn_empl input" type="number" name="Precio" required placeholder="Precio" id="Precio" title="Ingrese la Precio del producto" autocomplete="off" value="<?php echo $Precio; ?>"></td>
           </div>

           <label style="color:bisque" for="Peso">Peso:</label>
           <div>
             <td> <input class="btn_empl input" type="number" name="Peso" required placeholder="Peso" id="Peso" title="Ingrese el Peso del producto" autocomplete="off" value="<?php echo $Peso; ?>"></td>
           </div>

            <label style="color:bisque" for="Categoria">Categoria:</label>
           <div><td> <input class="btn_empl input" type="text" name="Categoria" required placeholder="Categoria" id="Categoria" title="Ingrese la Categoria" autocomplete="off" value="<?php echo $Categoria; ?>"></td>
           </div>

           <label style="color:bisque" for="Stock">Stock:</label>
           <div><td> <input class="btn_empl input" type="text" name="Stock" required placeholder="Stock" id="Stock" title="Ingrese el Stock" autocomplete="off" value="<?php echo $Stock; ?>"></td>
           </div>

           <label style="color:bisque" for="Nombre">Fecha_venta:</label>
           <div><td> <input class="btn_empl input" type="date" name="Fecha_venta" required placeholder="Fecha_venta" id="Fecha_venta" title="Ingrese la Fecha de venta" autocomplete="off" value="<?php echo date("Y-m-d", strtotime($fechaActual . " -1 day")); ?>"></td>
           </div>

          
             
           </div>
     
        
              <input class="botones" type="submit" value="Comprar Producto">
              <a class="botones" href="http://localhost/prueba/">Volver Menù Principal</a>
              </div>
            </form> 
           
      </div>
    <!-- fin insert -->

</body>
<script src="https://kit.fontawesome.com/176c817b83.js" crossorigin="anonymous"></script>
<script src="../js/main.js">
</script>
</html>
<?