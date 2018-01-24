<?php
    namespace Yang;
    class Exams{
        function BhTest($args)
        {
            $args1 = htmlspecialchars_decode($args);
            $args2 = preg_replace("/\s+/",'',$args1);
            $args3 = explode('</p>',$args2);
            $args6 = array();
            foreach($args3 as $key=>$value){
                if($value){
                    $args4 = str_replace("<p>", "", $value);
                    $args5 = explode(':',$args4);
                    $args6[] = array('key'=>$args5[0],'value'=>$args5[1]);
                }
            }
            return $args6;
        }
    }
?>