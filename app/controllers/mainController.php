<?php
namespace app\controllers;
use app\models\Main;
class MainController extends \vendor\core\base\Controller
{
	public $layout = 'first_template';
	public $view = 'view';
	
	public function view()
	{
		
	}
	public function index()
	{
            $model = new Main;
            //$res = $model->query('CREATE TABLE posts SELECT * FROM db_svn.projects');
            $posts = $model->findAll();
            $posts = $model->findOne('pass', 'password');
            $posts = $model->findBySql("SELECT * FROM {$model->table} WHERE id LIKE ?", [2]);
            $posts = $model->findLike('name2', 'name');
            var_dump($posts);
            $this->set(compact('posts'));
	}
}
