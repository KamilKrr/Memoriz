<?php

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);
if(empty($elements[0])) {
    header("Location: /toft");
} else switch(array_shift($elements))
{
    case 'home':
        header("Location: /home");
        break;
    default:
        header('HTTP/1.1 404 Not Found');
}

?>
