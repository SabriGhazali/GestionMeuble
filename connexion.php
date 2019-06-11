<?php
class connexion{


	private $host="localhost";
	private $base="gestionmeuble";
	private $user="root";
	private $pass="";
	private $idcon;

	public function __construct(){
		$this->idcon=new PDO("mysql:host=$this->host;dbname=$this->base",$this->user,$this->pass);
	}
	public function getIdcon(){
		return $this->idcon;
	}
}
?>
