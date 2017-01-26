<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor\core\base;

/**
 * Description of controller
 *
 * @author BloodKad_user
 */
abstract class Controller
{
	public $route = [];
	public $view;
	public $layout;
	public $vars = [];
	
	public function __construct($route)
	{
		$this->route = $route;
		$this->view = $route['action'];
	}
	
	public function getView()
	{
		$vObj = new View($this->route, $this->layout, $this->view);
		$vObj->render($this->vars);
	}
	
	public function set($vars)
	{
		$this->vars = $vars;
	}
}
