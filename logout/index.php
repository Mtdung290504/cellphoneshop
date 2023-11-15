<?php
    require_once('../util.php');
    session_start();
    session_destroy();
    header('Location: ..');
?>