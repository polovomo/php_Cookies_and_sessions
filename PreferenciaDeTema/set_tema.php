<?php
if (isset($_GET["tema_change"])) {
    $tema = $_GET["tema_change"];


    // Define cookie por 30 dias
    setcookie("tema_escolha", $tema, time() + (30 * 24 * 60 * 60));
}


header("Location: index.php");
