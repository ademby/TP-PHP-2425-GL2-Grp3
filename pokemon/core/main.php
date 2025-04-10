<?php
require_once __DIR__ . "/const.php";

/*== parsing _GET ==*/
$state = 'pick';
$show_faceoff = false;
$show_fight = false;
$get_pk_valid = false;
$get_pk1 = null;
$get_pk2 = null;
$get_fight = false;
$l = null;
$r = null;
if (isset($_GET['pk1'], $_GET['pk2'])) {
    $is_pk1_valid = filter_var($_GET['pk1'], FILTER_VALIDATE_INT) !== false;
    $is_pk2_valid = filter_var($_GET['pk2'], FILTER_VALIDATE_INT) !== false;
    
    if ($is_pk1_valid && $is_pk2_valid) {
        $get_pk1 = (int)$_GET['pk1'];
        $get_pk2 = (int)$_GET['pk2'];
        $get_pk_valid = Utils::validate_pks($get_pk1, $get_pk2);
    }
}
if (isset($_GET['f'])) {
    $f_value = filter_var($_GET['f'], FILTER_VALIDATE_INT);
    $get_fight = ($f_value !== false) && ($f_value !== 0);
}
if ($get_pk_valid) {
    $state = 'faceoff';
    $show_faceoff = true;
    if ($get_fight) {
        $state = 'fight';
        $show_fight = true;
    }
}

/*== Handeling post requests ==*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // from Form "pick"
    if (isset($_POST['pick'])) {
        $exclude = isset($_POST['exclude']) && $_POST['exclude'] ==='on';
        // pick randomly
        $pokemonIds = Utils::pick2pks($exclude);
        $pk1 = $pokemonIds[0];
        $pk2 = $pokemonIds[1];
        // redirect
        header("Location: ?pk1=$pk1&pk2=$pk2&exclude=$exclude");
        exit();
    }
    // from Button "Fight"
    if (isset($_POST['fight'])) {
        if ($state === 'pick') {
            // Unreachable state, redirect anyway
            $current_page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            header("Location: $current_page");  // strips ?query=params
        } else {
            header("Location: ?pk1={$get_pk1}&pk2={$get_pk2}&f=1");
        }
        exit();
    }
}

/*== calculate needed views ==*/
?>