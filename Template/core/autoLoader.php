<?php
$autoLoader = function ($Class){
    require '../classes/'.$Class.'.php';
};
spl_autoload_register($autoLoader);
?>
