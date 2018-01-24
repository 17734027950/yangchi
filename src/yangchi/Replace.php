<?php 
namespace Yang;
class Replace {
    public function str($filename, $origin_str, $old ,$new)
    {
    	$update_str = str_replace($old, $new, $origin_str);
		$content = file_put_contents($filename, $update_str);
		return $content;
    }
}
 ?>