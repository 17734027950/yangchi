<?php
namespace Yang;
class Yangchi{


	public function getAll($type = 0)
	{
		/**
		 * 0 不带端口 1带端口
		 * [$type description]
		 * @var [type]
		 */
		
		if($type=='0'){
			$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		}

		if($type=='1'){
			$url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}
		return $url;
	}

	public function getHost()
	{
		return $_SERVER['HTTP_HOST'];
	}

	public function getUrlAll($type = 0)
	{
		/**
		 * 0 不带端口 1带端口
		 * [$type description]
		 * @var [type]
		 */
		
		if($type=='0'){
			$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		}

		if($type=='1'){
			$url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}
		return $url;
	}



	public function getSelf()
	{
		return $_SERVER['PHP_SELF'];
	}

	public function getDir()
	{
		return __FILE__;
	}


	/**
	 * 数组转json 汉字不转义
	 * [jsonhan description]
	 * @param  [type] $array [description]
	 * @return [type]        [description]
	 */
	function jsonhan($array) {
	    if (version_compare(PHP_VERSION,'5.4.0','<')) {
	        $str = json_encode($array);
	        $str = preg_replace_callback (
	                "#\\\u([0-9a-f]{4})#i", 
	                function($matchs) {
	                    return iconv('UCS-2BE', 'UTF-8',  pack('H4',  $matchs[1])); 
	                },
	                $str
	            );
	        return $str;
	    } else {
	        return json_encode($array, JSON_UNESCAPED_UNICODE);
	    }
	}

	/**
	 * 循环创建文件夹
	 * [mk_dir description]
	 * @param  [type]  $dir  [description]
	 * @param  integer $mode [description]
	 * @return [type]        [description]
	 */
	function mk_dir($dir, $mode = 0755) 
	{ 
		if (is_dir($dir) || @mkdir($dir,$mode)) return true; 
		if (!$this->mk_dir(dirname($dir),$mode)) return false; 
		return @mkdir($dir,$mode); 
	} 
}

?>