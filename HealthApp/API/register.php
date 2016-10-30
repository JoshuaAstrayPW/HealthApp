<?php
require_once '../include.php';

if(isset($_REQUEST)){
    $arr=$_REQUEST;
    if(insert("userinfo", $arr))
        echo "true";
    else 
        echo "false";
}