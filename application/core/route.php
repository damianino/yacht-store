<?
class Route
{
	public static $routes;
	static function start()
	{
		//  контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		self::$routes = explode('/', $_SERVER['REQUEST_URI']);
		//  получаем имя контроллера
		if ( !empty(self::$routes[1]) )
		{	
			$controller_name = self::$routes[1];
		}
		
		//  получаем имя экшена
		if ( !empty(self::$routes[2]) )
		{
			$action_name = self::$routes[2];
		}

		//  добавляем префиксы
		$model_name = 'model_'.$controller_name;
		$controller_name = 'controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		//  подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		//  подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			
			// правильно было бы кинуть здесь исключение,
			// но для упрощения сразу сделаем редирект на страницу 404
			
			Route::ErrorPage404();
			return;
		}
		
		//  создаем контроллер
		//echo 'new '.$controller_name;
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			//  вызываем действие контроллера
			//echo 'controller action';
			$controller->$action();
		}
		else
		{
			//  здесь также разумнее было бы кинуть исключение
			//Route::ErrorPage404();
		}
	
	}
	
	static function ErrorPage404()
	{
		include 'application/models/model_404.php';
		include 'application/controllers/controller_404.php';
		$controller = new Controller_404;
		$controller->action_index();
    }
}