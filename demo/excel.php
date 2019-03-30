<?php
/**
 * 
 */

require_once __DIR__."/../vendor/autoload.php";

use PHPExcel_IOFactory;
use PHPExcel;

$file = dirname(__DIR__).'/../../public/uploads/insurewaste2.xlsx';
// 判断文件是什么格式
$type = pathinfo($file); 
$type = strtolower($type["extension"]);
if ($type=='xlsx') { 
    $type='Excel2007'; 
}elseif($type=='xls') { 
    $type = 'Excel5'; 
} 
ini_set('max_execution_time', '0');
vendor('PHPExcel.PHPExcel');
// 判断使用哪种格式
$objReader = \PHPExcel_IOFactory::createReader($type);
$objPHPExcel = $objReader->load($file); 
$sheet = $objPHPExcel->getSheet(0); 
// 取得总行数 
$highestRow = $sheet->getHighestRow();     
// 取得总列数      
$highestColumn = $sheet->getHighestColumn(); 
//总列数转换成数字
$numHighestColum = \PHPExcel_Cell::columnIndexFromString("$highestColumn");
//循环读取excel文件,读取一条,插入一条
$data=array();
//从第一行开始读取数据
for($j=2;$j<=$highestRow;$j++){
    //从A列读取数据
    for($k=0;$k<=$numHighestColum;$k++){
        //数字列转换成字母
        // echo $columnIndex = \PHPExcel_Cell::stringFromColumnIndex($k);
        // 读取单元格
        // 
        // 
        // if($objPHPExcel->getActiveSheet()->getCell("E$j")->getValue()){
        //     $data[$j] = array(
        //         'InsureNo'=>$objPHPExcel->getActiveSheet()->getCell("E$j")->getValue(),
        //         'Name'=>$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue(),
        //     );
        // }
            
        $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("F$j")->getValue();
    }
}
var_dump($data);

?>