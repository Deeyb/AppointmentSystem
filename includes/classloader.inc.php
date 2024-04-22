<?php


spl_autoload_register('myLoader');
function myLoader($classes){

    $folder = "classes/";
    $extension = ".class.php";
    $fullpath = $folder . $classes . $extension;
    include_once $fullpath;

}

?>