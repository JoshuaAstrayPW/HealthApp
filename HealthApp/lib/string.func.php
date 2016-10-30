<?php

function getRandString(){
   for($i=0;$i<4;$i++){
       
   }
}

/**生成唯一字符串
 * @return string
 */
function getUniName(){
    return md5(uniqid(microtime(true),true));
}

/**得到文件扩展名
 * @param unknown $filename
 * @return string
 */
 function getExt($filename){
     $tmp=explode(".",$filename);
    return strtolower(end($tmp));
}

function decodeUnicode($str)
{
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
        create_function(
            '$matches',
            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
            ),
        $str);
}
