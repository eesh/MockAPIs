<?php
    
    require 'vendor/autoload.php';
    
    $app = new \Slim\Slim();
    
    include('apis/userapi.php');
    include('apis/postsAPI.php');

    $app->run();
?>