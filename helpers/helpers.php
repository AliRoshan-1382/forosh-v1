<?php 
use App\Models\User;
use App\Models\Groups;
function site_url($route = '')
{
    // $_ENV['HOST'] = "http://localhost/phonebook/"
    $x = $_ENV['HOST'] . $route;
    return $x;
}

function asset_url($route = '')
{
    return site_url("assets/" . $route);
}

function random_elemant($arr){
    shuffle($arr);
    return array_pop($arr);
}

function xss_clean($str){
    return filter_var(htmlspecialchars($str), FILTER_SANITIZE_STRING);
}

function view($path , $data = []){
    extract($data);
    $path = str_replace('.' , '/' , $path);
    $view_full_path = BASEPATH . "views/$path.php";
    include_once $view_full_path;
}

function view_die($path , $data = []){
    view($path , $data);
    die();
}


function strContains($str,$needle,$case_sensitive = 0){
    if ($case_sensitive) 
        $pos = strpos($str,$needle);
    else
        $pos = stripos($str,$needle);
    
    return ($pos != false) ? true : false;    
}

function nice_dump($var){
    echo "<pre>";
    var_dump($var);
    echo "<pre>";
}

function nice_dd($var){
    nice_dump($var);
    die();
}
?>