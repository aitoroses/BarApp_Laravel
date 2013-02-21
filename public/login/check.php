<?php
session_start();
if ($_SESSION['tried'] == TRUE)
echo "Intento fallido";
?>