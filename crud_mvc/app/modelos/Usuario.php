<?php 
	
	class Usuario{
		private $db;//manejador bd

		public function __construct()
		{
			$this->db = new Base;
		}

		public function obtenerUsuarios()
		{
			$this->db->query('SELECT * FROM usuarios');//prepara la consulta
			$resultados = $this->db->registros();//ejecuta el sql y obtiene los registros 
			return $resultados;
		}

		public function agregarUsuarios($datos)
		{
			//obtiene los datos enviador del controlador
			// Utilizar 'sentencias preparadas'  ejemplo :nombre,:email,:telefono
			$this->db->query("INSERT INTO usuarios(nombre,email,telefono) VALUES (:nombre, :email, :telefono)");

			//vincular valores
			$this->db->bind(':nombre', $datos['nombre']);
			$this->db->bind(':email', $datos['email']);
			$this->db->bind(':telefono', $datos['telefono']);

			//Ejecutar 
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
			
		}

	}

 ?>