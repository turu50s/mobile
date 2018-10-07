<?php
# 「ini_set()」関数で設定可能なものを抽出する
    foreach(ini_get_all() as $directive => $option_arr){
        if($option_arr['access'] & 1)
            $ini_arr[$directive] = $option_arr;
    }
    
    print_r($ini_arr);
?>