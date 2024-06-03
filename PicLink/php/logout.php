<?php

// Riprendo i dati della sessione corrente e la distruggo;
// rimando alla homepage;

session_start();

session_destroy();

header("Location: ../index.php");

exit();
?>