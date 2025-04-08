<?php
$autoLoader = function ($Class){
    require '../../htdocs/tp_php/class/'.$Class.'.php';
};
spl_autoload_register($autoLoader);
?>