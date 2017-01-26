<?php
namespace vendor\core;
class Router
{
    protected static $rootes = []; // table of routs
    protected static $roote = []; // current rout
    
    public static function add($reqexp, $route = [])
    {
        self::$rootes[$reqexp] = $route;
    }
    
    public static function getRoutes()
    {
        return self::$rootes;
    }
    
    public static function getRoute()
    {
        return self::$roote;
    }
    
    public static function matchRoute($url)
    {
        foreach (self::$rootes as $key => $value)
        {
            if(preg_match("#$key#i", $url, $matches))
			{
                foreach ($matches as $k => $v)
                {
                    if(is_string($k))
                    {
                        $value[$k] = $v;
                    }
                }
				self::$roote = $value;
				
                if(!isset(self::$roote['action']))
                {
                    self::$roote['action'] = 'index'; // default action
                }
                return true;
            }
        }
        return false;
    }
    public static function dispatch($url)
    {
		$url = self::removeQueryString($url);
        if(self::matchRoute($url))
        {
            $controller = 'app\controllers\\' . self::lowerCamelCase(self::$roote['controller']) . 'Controller';
            if(class_exists($controller))
            {
                $controllerObj = new $controller(self::$roote);
				$action = self::lowerCamelCase(self::$roote['action']);
				if(method_exists($controllerObj, $action))
				{
					$controllerObj->$action();
					$controllerObj->getView();
				}
				else
				{
					echo 'method not found';
				}
            }
            else
            {
                echo 'controller not found';
            }
        }
        else
        {
            http_response_code(404);
            include '404.html';
        }
    }
	
	// delete '-' and upper firsts symbol for controller
	protected static function upperCamelCase($string)
	{
		$string = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
		return $string;
	}
	// delete '-' and lower first symbol for action (test-action = testAction)
	protected static function lowerCamelCase($string)
	{
		$string = lcfirst(self::upperCamelCase($string));
		return $string;
	}
	
	protected static function removeQueryString($url)
	{
		if($url)
		{
			$params = explode('&', $url, 2);
			if(false === strpos($params[0], '='))
			{
				return rtrim($params[0], '/');
			}
			else
			{
				return '';
			}
		}
		return $url;
	}
}