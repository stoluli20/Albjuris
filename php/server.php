<?php

http_response_code(404);

function get_http_response_code($domain1) {
    $headers = get_headers($domain1);
    return substr($headers[0], 9, 3);
}

// $var = get_http_response_code('http://127.0.0.1/Web_Project/php/server.php');

$var = get_headers("http://127.0.0.1/Web_Project/php/server.php");

echo $var;
