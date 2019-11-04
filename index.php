<?php

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);
if(empty($elements[0])) {
    header("Location: /home");
} else switch(array_shift($elements))
{
    case 'play':
        header("Location: /play");
        break;
    default:
        header('HTTP/1.1 404 Not Found');
}

?>
