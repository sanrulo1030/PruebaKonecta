<?php
	class Producto {
        var $ID;
		var $Nombre;
        var $Referencia;
        var $Precio;
        var $Peso;
		var $Categoria;
		var $Stock;
		var $Fecha_creacion;

		function __construct($ID,$Nombre,$Referencia,$Precio, $Peso,$Categoria,$Stock,$Fecha_creacion){
			$this->ID=$ID;
			$this->Nombre=$Nombre;
			$this->Referencia=$Referencia;
            $this->Precio=$Precio;
			$this->Peso=$Peso;
			$this->Categoria=$Categoria;
			$this->Stock=$Stock;
			$this->Fecha_creacion=$Fecha_creacion;

   
			}
		function getID(){
			return $this->ID;
		}
		function setID($ID){
			$this->ID=$ID;
		}
		function getNombre(){
			return $this->Nombre;
		}
		function setNombre($Nombre){
			$this->Nombre=$Nombre;
		}
		function getReferencia(){
			return $this->Referencia;
		}
		function setReferencia($Referencia){
			$this->Referencia=$Referencia;
		}
        function getPrecio(){
			return $this->Precio;
		}
		function setPrecio($Precio){
			$this->Precio=$Precio;
		}
		function getPeso(){
			return $this->Peso;
		}
		function setPeso($Peso){
			$this->Peso=$Peso;
		}
        function getCategoria(){
			return $this->Categoria;
		}
		function setCategoria($Categoria){
			$this->Categoria=$Categoria;
		}
		function getStock(){
			return $this->Stock;
		}
		function setStock($Stock){
			$this->Stock=$Stock;
		}
		function getFecha_creacion(){
			return $this->Fecha_creacion;
		}
		function setFecha_creacion($Fecha_creacion){
			$this->Fecha_creacion=$Fecha_creacion;
		}

	}
?>