<?php



include("../control/controlconexion.php");




            $SKU1                  =   htmlspecialchars($_REQUEST["SKU"],ENT_QUOTES,'UTF-8');
            $SKU= intval($SKU1);
            $nombre               =   htmlspecialchars($_REQUEST["nombre"],ENT_QUOTES,'UTF-8');
            $descripcion      =   htmlspecialchars($_REQUEST["descripcion"],ENT_QUOTES,'UTF-8');
            $valor      =   htmlspecialchars($_REQUEST["valor"],ENT_QUOTES,'UTF-8');
            $FKtienda      =   htmlspecialchars($_REQUEST["FKtienda"],ENT_QUOTES,'UTF-8');
            $imagen      =   htmlspecialchars($_REQUEST["imagen"],ENT_QUOTES,'UTF-8');

         

$db = new controlconexion();
$db->abrirBd("localhost","root","","tradesolutions");
$comandoSql = "update producto set nombre = '".$nombre."', descripcion='".$descripcion."', valor='".$valor."', FKtienda='".$FKtienda."', imagen='".$imagen."' where SKU = ".$SKU."";
$rs_id = $db->ejecutarSelect($comandoSql);


$db->cerrarBd();

if($rs_id){

  ?>
<script type="text/javascript">

 

                 var agree = confirm('Modificado con èxito, desea registrar otro producto?.');


                  if (agree) 
                    {

                             
                               

                              parent.location.href=('../vista/vistaProductos.php');

                               $('#loading').hide();
                               $('.content-page').show();
                               
                                




                                
                          


                    } else{ 

                        var agree = confirm('Desea consultar otra producto?.');


                  if (agree) 
                    {

                              parent.location.href=('../vista/vistaProductos.php');
                                $('#loading').hide();
                                $('.content-page').show();

                    }else{


                         parent.location.href=('../index.html');

                             $('#loading').hide();
                             $('.content-page').show();


                    }}

                  
  


                           
                       
</script>


<?php
  }

?>


