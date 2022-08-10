<?php
define('ROOT_URL', './');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');

define('DB_TABLE', 'phpblog');

//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_TABLE);
//check connection
if (mysqli_connect_errno()) {
    //connection has failed
    echo 'Failed to connect to MySQL ' . mysqli_connect_errno();
} else {
}
