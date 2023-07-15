<?php
class ControlProductos{
	var $objProductos;

	function __construct($objProductos){
		$this->objProductos=$objProductos;
	}

	 function guardar()
	{
        //$ID = $this->objProductos->getID();
		$Nombre=$this->objProductos->getNombre();
		$Referencia=$this->objProductos->getReferencia();
		$Precio=$this->objProductos->getPrecio();
		$Peso=$this->objProductos->getPeso();
        $Categoria = $this->objProductos->getCategoria();
        $Stock = $this->objProductos->getStock();
        $Fecha_creacion = $this->objProductos->getFecha_creacion();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","konecta");
		$cmdSql="INSERT INTO producto VALUES(NULL,'".$Nombre."','".$Referencia."',".$Precio.",".$Peso.",'".$Categoria."',".$Stock.",'".$Fecha_creacion."')";
		$objControlConexion->ejecutarComandoSql($cmdSql);
		$objControlConexion->cerrarBd();
	}

	function consultar()
	{
		$ID=$this->objProductos->getID();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","konecta");
		$cmdSql="SELECT * FROM producto  WHERE ID ='".$ID."'";
		$resultado = $objControlConexion->ejecutarSelect($cmdSql);
		$objControlConexion->cerrarBd();
		
		return $resultado;  
	}

	 function modificar()
	{
        $ID = $this->objProductos->getID();
		$Nombre=$this->objProductos->getNombre();
		$Referencia=$this->objProductos->getReferencia();
		$Precio=$this->objProductos->getPrecio();
		$Peso=$this->objProductos->getPeso();
        $Categoria = $this->objProductos->getCategoria();
        $Stock = $this->objProductos->getStock();
        $Fecha_creacion = $this->objProductos->getFecha_creacion();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","konecta");
		$cmdSql="UPDATE producto SET Nombre='".$Nombre."', Referencia='".$Referencia."', Precio='".$Precio."', Peso='".$Peso."', Categoria='".$Categoria."', Stock='".$Stock."', Fecha_creacion='".$Fecha_creacion."' WHERE ID='".$ID."'";
		$objControlConexion->ejecutarComandoSql($cmdSql);
		$objControlConexion->cerrarBd();
	}

	 function borrar()
	{
		$ID=$this->objProductos->getID();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","konecta");
		$cmdSql="DELETE FROM producto WHERE ID=".$ID."";
		$objControlConexion->ejecutarComandoSql($cmdSql);
		$objControlConexion->cerrarBd();
	}

	function Listar(){
		//$ID=$this->objProductos->getID();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","konecta");
		$cmdSql="SELECT * FROM producto";
		$resultado = $objControlConexion->ejecutarSelect($cmdSql);
		$objControlConexion->cerrarBd();
		
		return $resultado; 
	}

}
?>