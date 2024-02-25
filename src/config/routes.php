<?php

return [
    '/' => function() {
        require 'src/views/home.php';
    },
    '/login' => function() {
        require 'src/views/login.php';
    }
]

?>