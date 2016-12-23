<?php
    function var_tim($var, $max_depth = 3, $current_depth = 1){
        $spacer = function() use ($max_depth, $current_depth) {
            for($i = 1; $i < $current_depth ; $i++)
                echo "    ";
        };
        $looper = function($var) use ($max_depth, $current_depth, $spacer) {
            foreach($var as $key => $val) { 
               $spacer();
               echo "$key => ";
               var_tim($val, $max_depth, $current_depth+1);
               echo "\n";
            }
        };
        if($current_depth > $max_depth) {
            echo '..';
            return;
        }
        $type = gettype($var);
        if($type == "object") {
            $var_as_array = get_object_vars($var); 
            echo "{ \n";
            $looper($var_as_array);
            $spacer();
            echo "} \n";
        }
        else if($type == "array") {
           echo " [\n";
           $looper($var);
           $spacer();
           echo " ]\n";
        }
        else {
            if (is_null($var)) {
                echo "NULL";
            }
            else {
                echo "$type: ";
                echo "$var";
            }
        }
    }
?>
