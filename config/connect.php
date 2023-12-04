<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_olshop_projek');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('unable to connect');
