<?php

class ClienteDAO{
	private $cliente;

	public function __construct(){
		$this->cliente=new Cliente("", "", "");
	}
	//Método Read
	public function cargarCliente($id){
		$c=null;
		$dbOperator=new DBOperator("localhost", "root", "tienda", "", "utf8");
		$respuestaDB=$dbOperator->consult("SELECT * FROM `clientes` WHERE id = '$id' ", "yes");
		$c=new Cliente($respuestaDB[0], $respuestaDB[1], $respuestaDB[2]);
		$dbOperator->close();
		return $c;
	}

	//Método Create
	public function guardarCliente($cliente){
		$dbOperator=new DBOperator("localhost", "root", "tienda", "", "utf8");
		$respuestaDB=$dbOperator->consult("INSERT INTO `clientes` (`id`, `name`, `dir`) VALUES ('".$cliente->getId()."','".$cliente->getName()."','".$cliente->getDir()."');","no");
		$dbOperator->close();
		return $respuestaDB;
	}
//================================================
		//Método Update
	public function actualizarCliente($cliente){
		$dbOperator=new DBOperator("localhost", "root", "tienda", "", "utf8");

		$respuestaDB=$dbOperator->consult("UPDATE `clientes` SET `name` = '".$cliente->getName()."',  `dir` = '".$cliente->getDir()."' WHERE `clientes`.`id` ='".$cliente->getId()."' ","no");
		$dbOperator->close();
		return $respuestaDB;
	}

		//Método Delete
	public function eliminarCliente($id){
		$dbOperator=new DBOperator("localhost", "root", "tienda", "", "utf8");
		$respuestaDB=$dbOperator->consult("DELETE FROM `clientes` WHERE `clientes`.`id` ='".$id."';", "no");                                  
		$dbOperator->close();
		return $respuestaDB;
	}
}
