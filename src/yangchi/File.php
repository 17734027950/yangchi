<?php   
namespace Yang;
  
/** 
* ============================================================================ 
* 文件操作类 
* ============================================================================ 
* @author  aiden 
* @version 1.0 
*/
class File  
  {  
        
        /** 
         * 创建文件夹 
         * 
         * @param string $path 文件夹路径 
         */  
        public static  function createFolder($path)  
      {  
         if (!file_exists($path))  
         {  
            self::createFolder(dirname($path));  
            mkdir($path, 0777);  
         }  
      }  
  
  
      /** 
       * 得到指定目录里的信息 
       * 
       * @return unknown 
       */  
      public  static  function getFolder($path)  
      {  
             if (!is_dir($path))  
               return null;  
               
             $path = rtrim($path,'/').'/';    
  
             $array = array('file'=>array(),'folder'=>array());    
           $dir_obj = opendir($path);  
  
           while ($dir = readdir($dir_obj))  
           {           
                if ($dir != '.' && $dir != '..')  
                {  
                    $file = $path.$dir;  
                    if (is_dir($file))  
                       $array['folder'][] = $dir;  
                    elseif (is_file($file)){                           
                        $array['file'][] = $dir;  
                    }      
                          
                }         
           }             
           closedir($dir_obj);  
           return $array;  
  
      }  
  
        
      /** 
       * 删除文件 
       * 
       * @param string $path 文件路径 
       */  
      public  static function  delFile($path)  
      {  
           if (file_exists($path))  
           {  
                  @unlink($path);  
           }  
      }  
       
      /** 
       * 删除目录 
       * 
       * @param string $dir 目录路径 
       */  
     public static function deleteDir($path)   
     {               
             if (!is_dir($path))  
               return ;  
               
             $path = rtrim($path,'/').'/';    
  
           $dir_obj = opendir($path);  
  
           while ($dir = readdir($dir_obj))  
           {           
                if ($dir != '.' && $dir != '..')  
                {  
                    $file = $path.$dir;  
                    if (is_dir($file))  
                       self::deleteDir($file);  
                    elseif (is_file($file)){                           
                        unlink($file);  
                    }      
                          
                }         
           }             
           closedir($dir_obj);      
           rmdir($path);       
     }  
       
     /** 
      * 复制目录 
      * 
      * @param string $source  要复制的目录地址 
      * @param string $destination  目标目录地址 
      * @param int $child  是否复制子目录 
      * @return bool 
      */  
     public static  function xCopy($source, $destination, $child=1)  
     {   
        if(!is_dir($source))  
        {   
           echo("Error:the $source is not a direction!");   
           return 0;   
        }   
        if(!is_dir($destination))  
        {   
           mkdir($destination,0777);   
        }   
        $handle=dir($source);   
        while($entry=$handle->read())   
        {   
           if(($entry!=".")&&($entry!=".."))  
           {   
            if(is_dir($source."/".$entry))  
            {   
             if($child)   
               self::xCopy($source."/".$entry,$destination."/".$entry,$child);              
            }   
            else  
            {   
               copy($source."/".$entry,$destination."/".$entry);   
              
            }  
          
           }   
        }   
        return 1;   
     }  
       
     /** 
      * 复制文件 
      * 
      * @param string $source  要复制的目录地址 
      * @param string $destination  目标目录地址 
      * @return null 
      */  
     public static  function copyFile($source,$path)  
     {  
          $path  = str_replace('\\','/',$path);  
          $arr = explode('/',$path);  
          array_pop($arr);  
          $folder = join('/',$arr);  
          if (!is_dir($folder)){  
              self::createFolder($folder);             
          }  
           if (is_file($source)){  
               copy($source,$path);   
           }  
     }  
        
       
     /** 
      * 创建文件 
      *  
      * @param unknown_type $file 
      */  
     public static function createFile($file,$content='')  
     {  
         $folder = dirname($file);  
         if (!is_dir($folder)){  
             self::createFolder($folder);  
         }  
           
         file_put_contents($file,$content);  
     }  
  }  
  
  
  // File::createFile('a.php','ok');  // a.php -文件路径  ok-文件内容，这是我封装类，createFile-创建文件  createFolder-这两个方法需要用到，其它的你可以参考！  
?>  