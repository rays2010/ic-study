<?php 
    
    
    /**
     * array sort by keys
     *
     * @access  public
     * @param   array
     * @param   string
     * @param   string
     * @return  array
     */

    if ( ! function_exists('random_element'))
    {
        function array_sort($arr, $keys, $type = 'desc') {
            $keysvalue = $new_array = array();
            foreach ($arr as $k => $v) {
                $keysvalue[$k] = $v[$keys];
            }
            if ($type == 'asc') {
                asort($keysvalue);
            } else {
                arsort($keysvalue);
            }
            reset($keysvalue);
            foreach ($keysvalue as $k => $v) {
                $new_array[$k] = $arr[$k];
            }
            return $new_array;
         }
    }


?>