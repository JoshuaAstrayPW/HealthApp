<?php
require_once '../include.php';

if(isset($_REQUEST)){
    $arr=$_REQUEST;
    $sql="select *from userinfo where username=".$arr['username'];
  
    $row=fetchOne($sql);
    if($row){
    if($row['password']==$arr['password']){
        echo $row['id'] ;
    }else{
        echo "false";
    }
    }else{
        echo "false";
    }
}
  