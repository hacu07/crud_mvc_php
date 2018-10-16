<?php 
	/*Se encarga de configurar la ruta de la aplicacion
	del titulo del sitio dinamicamente...*/

	//Configuracion de acceso de la Base de datos
	define('DB_HOST','localhost');
	define('DB_USUARIO','root');
	define('DB_PASSWORD','');
	define('DB_NOMBRE','crud_mvc');

	//Ruta de la aplicacion 
	define('RUTA_APP', dirname(dirname(__FILE__)));//muestra ruta exacta del archivo donde estoy trabajando - dirname permite devolver a la carpeta anterior algo asi como 'cd ..''

	//Ruta url Ejemplo: 'http://localhost:8081/NOMBREPROYECTO'
	define('RUTA_URL', 'http://localhost:8081/crud_mvc');

	//Nombre del proyecto
	define('NOMBRESITIO', 'CRUD MVC - HAROLD');
?>