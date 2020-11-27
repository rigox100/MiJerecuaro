<?php
session_start();
unset ($_SESSION['idUsuario']);
unset ($_SESSION['nombre']);
unset ($_SESSION['email']);
unset ($_SESSION['idRol']);
session_destroy();
header('Location: index.php');