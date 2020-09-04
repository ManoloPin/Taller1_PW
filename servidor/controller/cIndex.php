<?php
require("../Libs/DBOperator.php");
require("../DAOs/ClienteDAO.php");
require("../classes/Cliente.php");

//Guardar un cliente
if(isset($_POST['enviar'])){
  $r=null;
  //Guardar datos en la base de datos
  //--1. Crear cliente
  $cliente=new Cliente($_POST['id'], $_POST['name'], $_POST['dir']);
  //--2. Crear un objeto clienteDAO
  $clienteDAO=new ClienteDAO();
  //--3. Guardar el cliente usando el ClienteDAO
  $r=$clienteDAO->guardarCliente($cliente);
  
  //Enviar response
  echo $r[0]; 
}
else if(isset($_POST['cargar'])){
  //Cargar datos de un cliente usando la cédula
  //--1. Crear un objeto ClienteDAO
  $clienteDAO=new ClienteDAO();
  //--2. Crear un objeto cliente usando ClienteDAO
  $cliente=$clienteDAO->cargarCliente($_POST['id']);
  //Enviar response
  echo $cliente->toString();
}
