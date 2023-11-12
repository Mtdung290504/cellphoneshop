<?php
    //LẤY TẤT CẢ FILE CSS & JS ĐỂ NHÚNG
    $styles = scandir(getRootUrl().'assets/styles');
    $scripts = scandir(getRootUrl().'assets/scripts');

    if($styles != false) {
        foreach($styles as $style) {
            if($style == '.' || $style == '..') continue;
            echo '<link rel="stylesheet" href="'.getRootUrl().'assets/styles/'.$style.'">';
        }
    }
    if($scripts != false) {
        foreach($scripts as $script) {
            if($script == '.' || $script == '..') continue;
            echo '<script src="'.getRootUrl().'assets/scripts/'.$script.'"></script>';
        }
    }   
?>