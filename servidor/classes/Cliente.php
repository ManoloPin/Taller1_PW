<?php

class Cliente{
  private $id;
  private $name;
  private $dir;

  public function __construct($id, $name, $dir){
    $this->id=$id;
    $this->name=$name;
    $this->dir=$dir;
  }

  public function setId($id){
    $this->id=$id;
  }
  public function getId(){
    return $this->id;
  }

  public function setName($name){
    $this->name=$name;
  }
  public function getName(){
    return $this->name;
  }

  public function setDir($dir){
    $this->dir=$dir;
  }
  public function getDir(){
    return $this->dir;
  }

  public function toString(){
    $resp="id: ".$this->id."\n"."name: ".$this->name."\n"."dir: ".$this->dir."\n";

    return $resp;
  }
}
