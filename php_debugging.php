<?php
    function var_tim($var, $max_depth = 3, $current_depth = 1){
        $looper = function($var) {
            foreach($var as $key => $val) { 
               echo "$key => ";
               var_tim($val, $max_depth, $current_depth+1);
               echo "\n";
            }
        }
        if($current_depth > $max_depth) {
            return '..';
        }
        if(gettype($var) == "object") {
            $var_as_array = get_object_vars($var); 
            echo "{ ";
            $looper($var_as_array);
            echo "} ";
        }
        else if(gettype($var) == "array") {
           echo " [";
           $looper($var);
           echo " [";

        }
        else {
            var_dump($var);
        }
    }
?>
