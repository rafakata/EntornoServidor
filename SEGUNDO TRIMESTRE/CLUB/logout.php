<?php
session_start();

session_unset();

session_destroy();

header("Location:index.php?mensaje=Has salido correctamente");
exit();
?>