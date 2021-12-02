<?php

    session_start(); //turn on sessions
    
    //Assign file paths to PHP constans
    //__FILE__ returns the current path to this file
    //dirname() return the path to the parent directory
    define("PRIVATE_PATH",dirname(__FILE__));
    define("PROJECT_PATH",dirname(PRIVATE_PATH));
    define("PUBLIC_PATH",PROJECT_PATH."/public");
    define("SHARED_PATH",PRIVATE_PATH."/shared");

    //Assing the root URL to a PHP constant
    //*Do not need to include the domain
    //*Use the same document root as webserver
    //Dynamically find everthing in URL up to "/public"
    $public_end = strpos($_SERVER["SCRIPT_NAME"],"/public") + 7;
    $doc_root = substr($_SERVER["SCRIPT_NAME"],0,$public_end);
    define("WWW_ROOT",$doc_root);

    require_once("functions.php");
    require_once("database.php");
    require_once("query_functions.php");
    require_once("validation_functions.php");
    require_once("auth_functions.php");

    $db = db_connect();
    $errors = [];


?>