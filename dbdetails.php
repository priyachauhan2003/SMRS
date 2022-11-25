<?php
session_start();
$con = new mysqli("localhost", "root", "", "phpclass");
if (!$con) {
    die("Some error with the connection." . $con->connect_error);
}
