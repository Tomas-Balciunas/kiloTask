<?php

function logger($msg)
{
    if (!file_exists("log.txt")) {
        file_put_contents("log.txt", "");
    }

    date_default_timezone_set('Europe/Vilnius');
    $time = date("Y-m-d H:i:s", time());
    $content = file_get_contents("log.txt");
    $content .= $time . "\t" . $msg . "\r";

    file_put_contents("log.txt", $content);
}
