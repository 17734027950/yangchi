<?php
namespace Yang;
class Files {
    public function fwrite($filename = '', $content = '')
    {
    	$myfile = fopen($filename, "w") or die("Unable to open file!");
		fwrite($myfile, $content);
		fclose($myfile);
    }
}

?>