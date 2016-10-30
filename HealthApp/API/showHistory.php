<?php
require_once '../include.php';
if(isset($_GET)){
    $uid=$_GET['uid'];
    $sql="select * from sportinfo where uid=".$uid;
    $rows=fetchAll($sql);
    if($rows){
      $jsonstr = decodeUnicode(json_encode($rows));
      echo $jsonstr;
    }else{
        echo "false";
    }
}