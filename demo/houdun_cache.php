<?php
/**
 * 
 */

require_once __DIR__."/../vendor/autoload.php";

\houdunwang\cache\Cache::set('data',['name'=>'houdunwang.com'],3600);
//缓存数据3600秒

var_dump(Cache::get('data'));

?>