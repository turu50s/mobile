<?php
# �uini_set()�v�֐��Őݒ�\�Ȃ��̂𒊏o����
    foreach(ini_get_all() as $directive => $option_arr){
        if($option_arr['access'] & 1)
            $ini_arr[$directive] = $option_arr;
    }
    
    print_r($ini_arr);
?>