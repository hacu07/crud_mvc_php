<?php 

	/**
	 * Clase Controlador principal
		Carga los modelos y las vistas
	 */
	class Controlador
	{
		
		function __construct()
		{
			
		}

		public function modelo($modelo){
			//Carga modelo
			require_once '../app/modelos/' . $modelo . '.php';
			//Instanciar el modelo
			return new $modelo();
		}

		//Cargar vista
		public function vista($vista, $datos = []){
			//chequea si el archivo existe
			if (file_exists('../app/vistas/' . $vista . '.php')) {
				require_once '../app/vistas/' . $vista . '.php';
			}else{
				// si el archivo de la vista no existe
				die('La vista no existe');
			}
		}
	}

?>