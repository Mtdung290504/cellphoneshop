<?php
    function getRootUrl() {
        $uri = $_SERVER['REQUEST_URI'];
        $dirs = explode('/', $uri);
        $link = '';
        $deep = count($dirs);
        if($deep==3) {
            $link .= './';
        } else if($deep>3) {
            while($deep>3) {
                $link .= '../';
                $deep--;
            }
        }
        return $link;
    }
?>