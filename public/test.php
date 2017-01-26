<?php

 require 'rb.php';
 $db = require '../config/config_db.php';
 R::setup($db['dsn'], $db['user'], $db['pass'], $options);
 R::freeze(true);
 R::fancyDebug(true);
 // var_dump(R::testConnection());
 
 // create
// $cat = R::dispense('category');
// $cat->title = 'Category 2';
 //$id = R::store($cat);
 // var_dump($id);
 
 // read
 //$cat = R::load('category', 2);
 // var_dump($cat->title);
 
 // update
// $cat = R::load('category', 2);
// $cat->title = 'Category 2 updated';
// R::store($cat);

 // delete
 //$cat = R::load('category', 6);
 //R::trash($cat);
 // clear table
 //R::wipe('category');
 
// $cats = R::findAll('category', 'id > ?', [2]);
// $cats = R::findAll('category', 'title LIKE ? ', ['%cat%']);
// $cats = R::findOne('category', 'id = 2');
// var_dump($cats);