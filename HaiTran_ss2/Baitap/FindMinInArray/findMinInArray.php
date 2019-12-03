<?php
    function findMinInArray($array) {
        $indexMin = 0;
        $min = $array[$indexMin];
        $index = 0;
        foreach ($array as $value) {
            if ($value < $min)
                $indexMin = $index;
            $index++;
        }
        return $indexMin;

}
?>