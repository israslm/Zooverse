<?php session_start();
if (isset($_GET[‘txtEmail’])) {
    echo $_GET[‘txtEmail’];
}