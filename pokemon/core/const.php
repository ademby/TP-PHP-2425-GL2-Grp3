<?php

define("IMAGES_DIR", "./assets/images/");

// pokemon types
define("PK_T_N", "normal");
define("PK_T_F", "fire");
define("PK_T_W", "water");
define("PK_T_G", "grass");
define("PK_T", [
    PK_T_N => IMAGES_DIR . PK_T_N . ".png", 
    PK_T_F => IMAGES_DIR . PK_T_F . ".png", 
    PK_T_W => IMAGES_DIR . PK_T_W . ".png", 
    PK_T_G => IMAGES_DIR . PK_T_G . ".png", 
]);
define("PK_T_LEN", count(PK_T));

// pokemon list
define("PK_LIST", [
    [
        "name" => "staraptor",
        "type" => PK_T_N,
        "image" => IMAGES_DIR . "staraptor.jpg",
        "hp" => 850,
        "minAtk" => 130,
        "maxAtk" => 180,
        "critCoef" => 1.5,
        "critProb" => 30,
    ],
    [
        "name" => "snorlax",
        "type" => PK_T_N,
        "image" => IMAGES_DIR . "snorlax.jpg",
        "hp" => 1200,
        "minAtk" => 125,
        "maxAtk" => 160,
        "critCoef" => 1.5,
        "critProb" => 20,
    ],
    [
        "name" => "ursaring",
        "type" => PK_T_N,
        "image" => IMAGES_DIR . "ursaring.jpg",
        "hp" => 900,
        "minAtk" => 120,
        "maxAtk" => 150,
        "critCoef" => 2.0,
        "critProb" => 30,
    ],
    [
        "name" => "arcanine",
        "type" => PK_T_F,
        "image" => IMAGES_DIR . "arcanine.jpg",
        "hp" => 900,
        "minAtk" => 120,
        "maxAtk" => 150,
        "critCoef" => 3.0,
        "critProb" => 30,
    ],
    [
        "name" => "ninetales",
        "type" => PK_T_F,
        "image" => IMAGES_DIR . "ninetales.jpg",
        "hp" => 730,
        "minAtk" => 100,
        "maxAtk" => 120,
        "critCoef" => 4.0,
        "critProb" => 30,
    ],
    [
        "name" => "lapras",
        "type" => PK_T_W,
        "image" => IMAGES_DIR . "lapras.jpg",
        "hp" => 1300,
        "minAtk" => 130,
        "maxAtk" => 170,
        "critCoef" => 1.5,
        "critProb" => 20,
    ],
    [
        "name" => "floatzel",
        "type" => PK_T_W,
        "image" => IMAGES_DIR . "floatzel.jpg",
        "hp" => 800,
        "minAtk" => 140,
        "maxAtk" => 230,
        "critCoef" => 3.0,
        "critProb" => 20,
    ],
    [
        "name" => "roserade",
        "type" => PK_T_G,
        "image" => IMAGES_DIR . "roserade.jpg",
        "hp" => 700,
        "minAtk" => 100,
        "maxAtk" => 140,
        "critCoef" => 4.0,
        "critProb" => 35,
    ],
    [
        "name" => "leafeon",
        "type" => PK_T_G,
        "image" => IMAGES_DIR . "leafeon.jpg",
        "hp" => 800,
        "minAtk" => 130,
        "maxAtk" => 170,
        "critCoef" => 2.0,
        "critProb" => 20,
    ],

]);
define("PK_LIST_LEN", count(PK_LIST));

// normal pokemon list
define ("PK_LIST_N", [
    PK_LIST[0],
    PK_LIST[1],
    PK_LIST[2],
]);
define("PK_LIST_N_LEN", count(PK_LIST_N));

// damage multipliers 
define("DMG_MUL", [
    PK_T_F . ">" . PK_T_G => 2.0,
    PK_T_F . ">" . PK_T_W => 0.5,
    PK_T_F . ">" . PK_T_F => 0.5,

    PK_T_W . ">" . PK_T_F => 2.0,
    PK_T_W . ">" . PK_T_W => 0.5,
    PK_T_W . ">" . PK_T_G => 0.5, 

    PK_T_G . ">" . PK_T_W => 2.0,
    PK_T_G . ">" . PK_T_F => 0.5,
    PK_T_G . ">" . PK_T_G => 0.5, 
]);
define("DMG_MUL_LEN", count(PK_LIST));

?>