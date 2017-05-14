<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>