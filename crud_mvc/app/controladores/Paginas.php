<?php 

	/**
	 * 
	 */
	class Paginas extends Controlador
	{
		
		function __construct()
		{
			//instancia delo modelo Usuario
			$this->usuarioModelo = $this->modelo('Usuario');
		}

		public function index(){

			//obtener los usuarios
			$usuarios = $this->usuarioModelo->obtenerUsuarios();

			$datos = [
				'usuarios'=> $usuarios
			];
			$this->vista('paginas/inicio',$datos);
		}

		public function agregar()
		{	//Si se ha enviado por POST EL FORMULARIO CON LOS DATOS (parametros)
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				//guarda los datos en el array $datos
				$datos = [
					'nombre' => trim($_POST['nombre']),
					'email' => trim($_POST['email']),
					'telefono' => trim($_POST['telefono'])
				];
				//si el metodo existe en el modelo, ejecuta el metodo agregarUsuarios
				if ($this->usuarioModelo->agregarUsuarios($datos)) {
					redireccionar('/paginas');//si se agrega redirecciona a paginas
				}else{
					die('Algo salio mal');
				}
			}else{
				//los datos deben estar vacios
				$datos = [
					'nombre' => '',
					'email' => '',
					'telefono' => ''
				];

				$this->vista('paginas/agregar',$datos);
			}
		}
	}

?>