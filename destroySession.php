<?php
session_start();

session_unset();
session_destroy();

echo "your session is destroyed";

?>