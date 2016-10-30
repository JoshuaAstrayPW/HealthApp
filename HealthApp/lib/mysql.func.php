<?php



function connect(){
   $link=@mysql_connect("localhost","root","")or die("连接数据库失败:".mysql_errno().":".mysql_error());
   @mysql_set_charset(DB_CHARSET);
   @mysql_select_db(DB_NAME)or die("ָ打开数据库失败");
   
}

/**
 * 
 * @param unknown $table
 * @param unknown $array
 * @return 
 */
function insert($table, $array)
{
    $key = join(",", array_keys($array));
    $value = "'" . join("','", array_values($array)) . "'";
    $sql = "insert {$table}($key) values({$value})";
    
    @mysql_query($sql);
    
    return mysql_insert_id();
}

/**
 * 
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function  updata($table,$array,$where=null){
    $str=null;
    foreach ($array as $key=>$val){
        if($str==null){
            $sep="";
        }
        else {
            $sep=",";
        }
            $str.=$sep.$key."='".$val."'";
    }
             $sql="update {$table} set {$str}".($where==null?null:"where ".$where);        
             $result=@mysql_query($sql);
             if($result){
             return @mysql_affected_rows();
             }else{
                 return false;
             }
        
    }
    
/**
 * 删除数据
 * @param srting $table
 * @param string $where
 * @return number
 */
function delete($table ,$where=NULL){
    $where=$where==null?null:"where ".$where;
    $sql="delete from {$table} {$where}";
    @mysql_query($sql);
    return @mysql_affected_rows();
}

/**查询一条记录
 * @param string $sql
 * @param string $result_type
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=@mysql_query($sql);
    $row=@mysql_fetch_array($result,$result_type=MYSQL_ASSOC);
    return $row;
}

/**查询所有记录
 * @param string $sql
 * @param string $result_type
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result=@mysql_query($sql);
    while(@$row=mysql_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}

/**���ؼ�¼������
 * @param unknown $sql
 * @return number
 */
function getResultNum($sql){
    $result=@mysql_query($sql);
    return @mysql_num_rows($result);
}

/** 得到上一步插入记录的ID
 * @return number
 */
function getInsertId(){
    return @mysql_insert_id();
}