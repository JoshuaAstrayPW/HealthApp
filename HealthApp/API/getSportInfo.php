<?php
require_once '../include.php';
if(isset($_POST)){
    $arrs=$_POST;
    if(insert("sportInfo", $arrs))
        echo "true";
    else
        echo "false";
}