<?php



include '../control/controlconexion.php';


$SKU				=	htmlspecialchars($_REQUEST["SKU"],ENT_QUOTES,'UTF-8');



$db = new controlconexion();
                                                $db->abrirBd("localhost","root","","tradesolutions");
                                                $comandoSql = "DELETE FROM producto WHERE SKU = '".$SKU."'";
                                                $rs = $db->ejecutarSelect($comandoSql);


if($rs){

	?>


	<script type="text/javascript">

 

                 var agree = confirm('Eliminado con èxito, desea registrar otro producto?.');


                  if (agree) 
                    {

                             
                               

                              parent.location.href=('../vista/vistaProductos.php');

                              $('#loading').hide();
                               $('.content-page').show();
                               
                                




                                
                          


                    } else{ 

                        var agree = confirm('Desea consultar otro producto?.');


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

