<?php

$db_host = "localhost";
$db_name = "cms_db";
$db_user = "cms_user";
$db_pass = "fGd9g)LfjpTSObAK";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}