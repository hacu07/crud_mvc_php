<?php 

	/*
	Mapear la url ingresada en el navegador
	1. controlador
	2. metodo
	3. parametro
	Ejemplo: De la url http://localhost:8081/mvc_r2w/public/productos/actualizar/1
		se obtiene productos/actualizar/1
	*/
	class Core 
	{
		/*Cuando no se cargue ninguna url carga un
		controlador por defecto
		metodo por defecto -> index
		parametros vacios
		*/
		protected $controladorActual= 'paginas';
		protected $metodoActual = 'index';
		protected $parametros = [];

		public function __construct()
		{
			//print_r($this->getUrl());
			$url = $this->getUrl();

			//Evalua si el archivo existe en 'controladores'
			//de la url tomada en la posicion 0 que contiene el nombre del controlador la primera letra la convierte a mayuscula (ejemplo: 'P'aginas.php)
			if (file_exists('../app/controladores/'. ucwords($url['0']). '.php')) {
				//Si existe se setea como controlador por defecto
				$this->controladorActual = ucwords($url['0']);

				//unset indice
				unset($url[0]);//El controlador actual es desmontado y pasa a ser el nuevo el controlador encargado

			}

			//requerir el controlador
			require_once '../app/controladores/'.$this->controladorActual. '.php';
			$this->controladorActual = new $this->controladorActual;

			//chequear la segunda parte de la url que seria el metodo - posicion 1 en arreglo url
			if (isset($url[1])) {
				if (method_exists($this->controladorActual, $url[1])) {
					//Chequeamos el metodo
					$this->metodoActual = $url[1];
					//desmonta
					unset($url[1]);
				}
			}

			//para probar que trae el metodo
			//echo $this->metodoActual;

			/*
				Obtener los posibles parametros
			*/
			$this->parametros = $url ? array_values($url) : []; //operador ternario

			//llamado a funcion callback con parametros array
			call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros); 
		}

		/*
		Obtiene la URL del navegador
		Esa url se asigna en variable debido a lo escrito en .htaccess de la carpeta public
		*/
		public function getUrl(){
			//echo $_GET['url'];

			if (isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');//Elimina espacios de la URL
				$url = filter_var($url,FILTER_SANITIZE_URL);//Valida que sea leido como una url
				$url = explode('/', $url);
				return $url;
			}
		}
	}

?>