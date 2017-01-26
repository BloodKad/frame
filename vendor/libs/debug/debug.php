<?php

function debug()
{
    $quantity_params = func_num_args();
    if($quantity_params == 0) return false;
    elseif($quantity_params == 1) $result = debugOneParam(func_get_arg(0));
    else $result = debugListParams(func_get_args(), $quantity_params);
    return $result;
}
function debugOneParam($param)
{
    $type_param = getTypeParam($param);
    $class_param = getClasses($param);
    
    if($type_param == 'string')
    {
        $length = strlen($param);
    }
    elseif($type_param == 'array')
    {
        $length = count($param);
        return debugListParams($param, $length);
    }
    else $length = false;
    return debugListParams($params, 1);
    return viewResult($param, $type_param, $class_param, $length);
}
function debugListParams($params, $quantity_params)
{
    // to do
    echo '<pre>';
    var_dump($params);
    echo '</pre>';
    return $params;
}
function getTypeParam($params)
{
    return gettype($params);
}
function getClasses($params)
{
    if(is_object($params))
    {
        return get_class($params);
    }
    else return false;
}
function viewResult($param, $type_param, $class_param, $length)
{
    echo '<link rel="stylesheet" media="all" href="/vendor/libs/debug/style_debug.css" />';
    
    echo '<div id="main_debug" class="main_debug">';
        
            echo '<ul class="block_param">';
                echo '<li> VALUE = [' . $param . '] </li>';
                echo '<li> TYPE = [' . $type_param . '] </li>';
                echo '<li> LENGTH = [' . $length . '] </li>';
                if($class_param)
                {
                    echo 'IS OBJECT, CLASS = [' . $class_param . ']';
                }
            echo '</ul>';
        
    echo '</div>';
}