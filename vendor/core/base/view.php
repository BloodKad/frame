<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

/**
 * Description of view
 *
 * @author BloodKad_user
 */
class View
{
	
	public $route = [];
	public $view = [];
	public $layout = [];
	
	public function __construct($route, $layout = '', $view = '')
	{
		$this->route = $route;
		$this->layout = $layout ?: LAYOUT;
		$this->view = $view;
	}
	
	public function render($vars)
	{
		extract($vars);
		$file_view = APP . '/views/' . $this->route['controller'] . '/' . $this->view . '.php';
		ob_start();
		if(is_file($file_view))
		{
			include $file_view;
		}
		else
		{
			echo 'Не найден вид' . $file_view;
		}
		$content = ob_get_clean();
		
		$file_layout = APP . '/views/layout/' . $this->layout . '.php';
		if(is_file($file_layout))
		{
			require_once $file_layout;
		}
		else
		{
			echo 'layout не найден' . $file_layout;
		}
	}
	
}
